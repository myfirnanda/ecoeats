<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use App\Models\City;
use App\Models\Voucher;

use Exception;

use Kavist\RajaOngkir\Facades\RajaOngkir;

use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // $slug = $request->query('product');
        // $product = Product::where('slug', $slug)->firstOrFail();
        $cartProducts = Cart::with(['user', 'product'])->where('user_id', $user->id)->get();

        $cartProductsQuantityAll = Cart::where('user_id', $user->id)->sum('quantity');
        $cartProductsSubtotalAll = Cart::where('user_id', $user->id)->sum('subtotal');
        $totalWeight = $cartProducts->sum(function ($cartProduct) {
            return $cartProduct->product->weight * $cartProduct->quantity;
        });
        $totalPrice;

        $provinces = Province::all();

        // $cost = RajaOngkir::ongkosKirim([
        //     'origin'        => 155,     // ID kota/kabupaten asal (biarin)
        //     'destination'   => 80,      // ID kota/kabupaten tujuan
        //     'weight'        => $totalWeight,    // berat barang dalam gram
        //     'courier'       => 'jne',    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        // ])->get();

        // // dd($cost);

        return view('checkout', [
            "carts" => $cartProducts,
            "cartProductsQuantity" => $cartProductsQuantityAll,
            "cartProductsSubtotal" => $cartProductsSubtotalAll,
            "totalWeight" => $totalWeight,
            "provinces" => $provinces,
            // "cost" => $cost
        ]);
    }

    public function getCities($id) {
        $cities = City::where('province_id', $id)->get();
        return response()->json($cities);
    }

    public function shippingPrice(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->origin,     // ID kota/kabupaten asal
            'destination'   => $request->destination,      // ID kota/kabupaten tujuan
            'weight'        => $request->weight,    // berat barang dalam gram
            'courier'       => $request->courier,    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        return response()->json($cost);
    }

    public function getVoucher($code) {
        $voucher = Voucher::where('code', $code)->first();

        if (!$voucher) {
            return response()->json([
                "success" => false,
                "message" => "Invalid Voucher Code"
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "Successful Get Voucher Code",
            "data" => $voucher,
        ]);
    }



    public function process(Request $request)
    {
        function generateRandomSKU($length = 8) {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            $max = strlen($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $max)];
            }
            return $randomString;
        }

        // Save user data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // checkout process
        $code = generateRandomSKU();
        $carts = Cart::with(['user', 'product'])->where('user_id', $user->id)->get();

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'insurance_price' => 0,
            // 'shipping_price' => 0, <-------- dinonaktif tapi belum cek model sama tabel
            'total_price' => 100000,
            // 'total_price' => $request->total_price,
            'order_status' => 'PENDING',
            'code' => $code,
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . $code;

            OrderDetail::create([
                'code' => $trx,
                'quantity' => $cart->quantity,
                'subtotal' => $cart->subtotal,
                'order_id' => $order->id,
                'product_id' => $cart->product->id,
            ]);
        }

        // Delete Cart Data
        Cart::where('user_id', Auth::user()->id)->delete();

        ShippingDetail::create([
            'shipping_company' => $request->shipping_company,
            'shipping_service' => $request->shipping_service,
            'shipping_cost' => $request->shipping_cost,
            'shipping_etd' => $request->shipping_etd,
            'shipping_status' => '',
            'order_id' => $order_id,
        ]);

        RecipientDetail::create([
            'full_name' => $request->full_name,
            'email' => '',
            'phone_number' => '',
            'address1' => '',
            'address2' => '',
            'zip_code' => '',
            'province_id' => '',
            'city_id' => '',
            'order_id' => $order_id,
        ]);

        // Midtrans Configuration
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Create array and deliver to midtrans
        $midtrans = [
            'order_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bank_transfer'
            ],
            'vtweb' => [],
            'finish_redirect_url' => route('homepage'),
        ];

        try {
            $paymentUrl = Snap::createOrder($midtrans)->redirect_url;
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        // Midtrans Configuration
        Config::$serverKey = config('services.midtrans.serverKey');
        // Config::$clientKey = config('services.midtrans.clientKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$is3ds = config('services.midtrans.is3ds');
        Config::$isSanitized = config('services.midtrans.isSanitized');

        // Instance Midtrans Notification
        $notification = new Notification();

        // Assign to variable to code easier
        $status = $notification->order_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Search order based ID
        $order = order::findOrFail($order_id);

        // Handle notification status
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challange') {
                    $order->order_status = "PENDING";
                } else {
                    $order->order_status = "SUCCESS";
                }
            }
        }
        else if ($status == 'settlement') {
            $order->order_status = "SUCCESS";
        }
        else if ($status == 'pending') {
            $order->order_status = "PENDING";
        }
        else if ($status == 'deny') {
            $order->order_status = "CANCELED";
        }
        else if ($status == 'expire') {
            $order->order_status = "CANCELED";
        }
        else if ($status == 'cancel') {
            $order->order_status = "CANCELED";
        }

        // Save order status
        $order->save();
    }
}
