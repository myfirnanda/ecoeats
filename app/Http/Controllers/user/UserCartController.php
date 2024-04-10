<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $userCartProducts = Cart::with(['user', 'product'])->where('user_id', $user->id)->get();

        $userCartProductsCount = Cart::where('user_id', $user->id)->count();

        return view('userDashboard.cart', [
            'carts' => $userCartProducts,
            'cartsCount' => $userCartProductsCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        $user = auth()->user();
        // GW MASIH BINGUNG PENARGETAN SINGULAR GIMANA, SOALNYA KLO YANG DESTROY SEPERTINYA DAH BENER
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        // Bagaimana bisa tahu kalo yang diupdate quantity nya, maksudnya darimana tahu id yang mana yang haru di update? ini aja pake Cart $cart di parameter method updatenya, kalo ada Cart $cart berarti menargetkan singular
        Cart::update($validatedData)->where('user_id', $user->id);

        return redirect('/user/cart')->with('success', 'Successful Update Your Cart');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cart $cart)
    {
        $cartProduct = $request->cart;

        Cart::destroy($cartProduct->id);

        return redirect('/user/cart')->with('success', 'Successful Delete Cart Product!');
    }

    public function updateAll(Request $request)
    {
        $cartIds = $request->input('cartIds');
        $cartQuantities = $request->input('cartQuantities');
        
        foreach($cartIds as $cartId) {
            $quantity = array_shift($cartQuantities);
            
            // Dapatkan instance Cart untuk setiap $cartId
            $cart = Cart::with(['product', 'user'])->where('id', $cartId)->first();

            // Pastikan $cart ditemukan sebelum melanjutkan
            if ($cart) {
                // Update quantity
                $cart->update(['quantity' => $quantity]);

                // Update price
                $cart->update(['subtotal' => $cart->product->price * $quantity]);
            }
        }
    }

    public function clear()
    {
        $user = auth()->user();

        Cart::where('user_id', $user->id)->delete();

        return back();
    }
}
