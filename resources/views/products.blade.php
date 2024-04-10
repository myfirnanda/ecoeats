@extends('layouts.main')

@section('pageTitle')
    Ecoeats - Shop
@endsection

@section('content')
    <div class="container mx-auto px-4">
        <section id="heading-content">
            <div class="my-6">
                <h1 class="text-6xl text-semibold text-center">Discover Every Shop Item List</h1>
            </div>
        </section>
        <section class="pt-[2rem] pb-[4rem]" id="categories">
            <div class="container mx-auto">
                <div class="mt-5">
                    <div class="grid grid-cols-2 sm:grid-cols-7 md:grid-cold-6 gap-4 md:gap-0" id="category-container">
                        @foreach ($categories as $category)
                            <a href="/categories/{{ $category->slug }}" id="category-item" class="flex flex-col items-center text-center">
                                <div class="img-box">
                                    <img src="{{ asset('storage/category-images/' . $category->image_name) }}" alt="Image of {{ $category->name }}" class="" style="border-radius: 50%; height: 6rem" width="100">
                                </div>
                                <div class="text-box mt-2 font-medium">
                                    <h4>{{ $category->name }}</h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section id="best-seller">
            <div class="container mx-auto">
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4" id="best-seller-container">
                    @foreach ($products as $product)
                        <a href="{{ route('products.show', $product) }}" class="best-seller-item rounded overflow-hidden shadow-lg">
                            <div>
                                <img class="w-full" src="{{ asset('storage/product-images/' . $product->image_cover) }}" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class=" flex justify-between items-center w-full">
                                        <span class="rounded-full text-base font-semibold uppercase text-gray-400">{{ $product->category->name }}</span>
                                        <span class="inline-block rounded-full text-lg font-bold text-emerald-600">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                                    <p class="text-gray-700 text-base line-clamp-3">{{ $product->description }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
