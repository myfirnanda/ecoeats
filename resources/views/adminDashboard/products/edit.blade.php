@extends('adminDashboard.layouts.main')

@section('pageTitle')
    Edit Product - Admin
@endsection

@section('content')
    <h1 class="text-4xl font-bold">Edit New Product</h1>
    @if (session('message'))
        {{ session('message') }}
    @endif
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="my-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
            <input type="file" id="base-input" class="file:bg-gray-700 file:text-white bg-gray-50 border file:border-transparent file:p-2.5 text-gray-900 file:mr-5 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" name="image_cover">
            @error('image_cover')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="name" value={{ old('name', $product->name) }}>
            @error('name')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                    Rp
                </span>
                <input type="text" id="website-admin" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 " placeholder="150000" name="price" value={{ old('price', $product->price) }}>
              </div>
              @error('price')
                <p class="text-red-500">{{ $message }}</p>
              @enderror
        </div>
        <div class="mb-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
            <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="stock" value={{ old('stock', $product->stock) }}>
            @error('stock')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select category</label>
            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category_id">
                {{-- <option value="#" disabled selected>Choose Product Category</option> --}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Leave a comment..." name="description">{{ old('description', $product->description) }}</textarea>
            @error('description')
              <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn bg-gray-700 text-white px-3 py-2 rounded">Update Product</button>
    </form>
@endsection