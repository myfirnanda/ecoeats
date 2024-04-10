<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    // Web Endpoints

    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $products = Product::all();
        return view('adminDashboard.products.index', [
            "products" => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('adminDashboard.products.create', [
            "categories" => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_cover' => 'file|image|max:1024|required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        if($request->hasFile('image_cover')) {
            $validatedData['image_cover'] = $request->file('image_cover')->store('/product-images');
        }

        $slug = Str::slug($validatedData['name']);
        $slugTitle = $slug;
        $count = 2;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $slugTitle . '-' . $count;
            $count++;
        }
        $validatedData['slug'] = $slug;

        Product::create($validatedData);

        // foreach($files as $file) {
        //     $image = $file->store('/product-images');
        //     ProductImages::create([
        //         "product_id" => $product->id,
        //         "image_path" => $image
        //     ]);
        // }

        return redirect('/admin/products')->with('success', 'Successful Add New Product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('adminDashboard.products.show', [
            "product" => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('adminDashboard.products.edit', [
            "product" => $product,
            "categories" => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            "image_cover" => "file|image|max:1024|required",
            "name" => "required",
            "price" => "required",
            "stock" => "required",
            "description" => "required",
            "category_id" => "required"
        ]);
        
        if($request->hasFile('image_cover')) {
            Storage::delete($product->image_cover);
            $validatedData['image_cover'] = $request->file('image_cover')->store('/product-images');
        }
        
        $slug = Str::slug($validatedData['name']);
        $count = 2;
        if($validatedData['slug']->exists()) {
            $slug = $slug . '-' . $count;
            $count++;
        }

        $validatedData['slug'] = $slug;
        $validatedData['category_id'] = $request->category_id;

        Product::update($validatedData);

        return redirect('/admin/products')->with('success', 'Successful Edit Product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $productCover = $product->image_cover;
        // $images = ProductImages::where('product_id', $productId)->get();

        Product::destroy($product->slug);
        if($productCover) {
            Storage::delete($productCover);
        }

        // if(count($images) > 0) {
        //     foreach($images as $image) {
        //         ProductImages::destroy($image->id);
        //         Storage::delete($image->image_path);
        //     }
        // }

        return redirect('/admin/products')->with('success', 'Successful Delete Product');
    }

    // API Endpoints

    public function apiIndex()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function apiShow(Product $product)
    {
        return new ProductResource($product);
    }

    public function apiStore()
    {}

    public function apiUpdate()
    {}

    public function apiDestroy()
    {}
}
