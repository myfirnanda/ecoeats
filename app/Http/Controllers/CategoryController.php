<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $category = Category::where('slug', $category->slug)->first();

        return view('category', [
            "category" => $category,
        ]);
    }
}
