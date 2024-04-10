<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('adminDashboard.categories.index', [
            "categories" => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminDashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "image_name" => "file|image|max:1024|required",
            "name" => "required",
        ]);

        if($request->hasFile('cover_image')) {
            $validatedData['cover_image'] = $request->file('cover_image')->store('/product-images');
        }

        $slug = Str::slug($validatedData['name']);
        $slugTitle = $slug;
        $count = 2;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $slugTitle . '-' . $count;
            $count++;
        }
        $validatedData['slug'] = $slug;

        Category::create($validatedData);

        return redirect('/admin/categories')->with('success', 'Successful Add New Category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::where('slug', $category->slug);
        return view('adminDashboard.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('adminDashboard.categories.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            "image_cover" => "file|image|max:1024|required",
            "name" => "required",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return route('admin.categories.index')->with('error', 'Category Not Found!');
        }

        $category->delete();
        Storage::delete($category->image_name);

        return redirect()->route('admin.categories.index');
    }
}
