<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomepageController extends Controller
{
    public function index()
    {
        $products = Product::take(10)->get();
        $categories = Category::all();
        $bestSellerProduct = Product::orderBy('sold', 'desc')->get();
        return view('homepage', [
            "products" => $products,
            "categories" => $categories,
        ]);
    }
}
