<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Wishlist;

class ProductController extends Controller
{
    // Web Endpoints
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        return view('products', [
            "categories" => $categories,
            "products" => $products,
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            "product" => $product,
        ]);
    }

    public function addToCart(Request $request, Product $product)
    {
        $user = auth()->user();
        $product = $request->product;

        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $subtotal = $product->price * $validatedData['quantity'];

        // dd($request);

        $existingCartProduct = Cart::where('user_id', $user->id)
                                    ->where('product_id', $product->id)
                                    ->first();
        if ($existingCartProduct) {
            $existingCartProduct->update([
                'quantity' => $existingCartProduct->quantity + $validatedData['quantity']
            ]);
        } else {
            Cart::create([
                'quantity' => $request->quantity,
                'subtotal' => $subtotal,
                'user_id' => $user->id,
                'product_id' => $product->id,
            ]);
        }

        return back()->with('success', 'Successful add product to cart');
    }

    public function addToWishlist(Request $request, Product $product)
    {
        $user = auth()->user();
        $product = $request->product;

        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        return back()->with('success', 'Successful add to wishlist');
    }

    public function removeToWishlist(Product $product) {
        Wishlist::destroy($product->id);

        return redirect(`/products/${$product->slug}`)->with('success', 'Successful remove from wishlist');
    }

    // API Endpoints

    // public function apiIndex(Request $request)
    // {
    //     $query = Product::query();

    //     if ($request->has('sort')) {
    //         $sortOrder = strtolower($request->input('sort'));

    //         if ($sortOrder === 'low-high') {
    //             $query->orderBy('price', 'asc');
    //         } elseif ($sortOrder === 'high-low') {
    //             $query->orderBy('price', 'desc');
    //         }

    //         $products = $query->get();
    //         return ProductResource::collection($products);
    //     } else {
    //         $products = Product::all();
    //         return ProductResource::collection($products);
    //     }
    // }

    // public function apiShow($slug)
    // {
    //     $product = Product::where('slug', $slug)->first();

    //     if (!$product) {
    //         return response()->json(['message' => 'Product not found'], 404);
    //     }

    //     return new ProductResource($product);
    // }
}
