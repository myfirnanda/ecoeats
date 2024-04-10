@extends('adminDashboard.layouts.main')

@section('pageTitle')
    {{ $product->title }} - Detail Page
@endsection

@section('content')
    <div>
        <a href="{{ route('admin.products.index') }}" class="text-blue-400"><i class="ri-arrow-left-double-fill"></i>Go back</a>
        <img src="{{ asset('storage/' . $product->image_cover) }}" alt="{{ $product->name }}">
        <div class="flex justify-between items-center">
            <h3 class="text-3xl font-bold mb-3">{{ $product->name }}</h3>
            <div class="price text-xl font-semibold">
                Rp{{ number_format($product->price, 0, ',', '.') }}
            </div>
        </div>
        <div class="grid grid-cols-2 w-72">
            <h5 class="font-bold mb-1">Product Category</h5>
            <p>: {{ $product->category->name }}</p>
            <h6 class="font-bold mb-1">Stock</h6>
            <p>: {{ $product->stock }}</p>
            <h5 class="font-bold mb-1">Sold</h5>
            <p>: {{ $product->sold }}</p>
        </div>
        <h6 class="font-bold">Descrption</h6>
        <hr>
        <p>{{ $product->description }}</p>
    </div>
@endsection