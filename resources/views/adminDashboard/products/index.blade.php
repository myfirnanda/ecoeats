@extends('adminDashboard.layouts.main')

@section('pageTitle')
    Products - Admin
@endsection

@section('content')
    <div class="flex justify-between items-center mb-5">
        <h1 class="text-4xl font-bold">Product List</h1>
        <a href="{{ route('admin.products.create') }}">
            <button>Add Product</button>
        </a>
    </div>
    <div class="grid grid-cols-4 gap-3">
        @foreach ($products as $product)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                @if ($product->image_cover)
                    <img class="w-full" src="{{ asset('storage/' . $product->image_cover) }}" alt="{{ $product->name }} Product Cover Image">
                @else
                    <img src="https://images.unsplash.com/photo-1584824486516-0555a07fc511?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fG5vdCUyMGZvdW5kfGVufDB8fDB8fHww" alt="">
                @endif
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2"><a href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a></div>
                    <p class="text-gray-700 text-base line-clamp-3">{{ $product->description }}</p>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mt-4">{{ $product->category->name }}</span>
                </div>
                <div class="sticky top-full">
                    <div class="grid grid-cols-2 gap-3 p-2">
                        <a href="{{ route('admin.products.edit', $product) }}">
                            <button class="btn bg-yellow-400 px-3 py-2 rounded font-semibold text-white w-full">Edit</button>
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-red-500 px-3 py-2 rounded font-semibold text-current text-white w-full">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection