@extends('layouts.main')

@section('pageTitle')
    {{ $product->name }} | EcoEats Product Detail
@endsection

@section('content')
    <div class="container mx-auto px-4">
        <div class="my-6">
            <div class="breadcrumb mb-6">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('homepage') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="{{ route('products.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Products</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $product->name }}</span>
                        </div>
                    </li>
                </ol>
            </div>
            <div class="product-detail">
                @if(session('error'))
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 gap-2" role="alert">
                        <i class='bx bxs-check-circle bx-xs'></i>
                        <div>
                            <span class="font-medium">Error</span> {{ session('error') }}.
                        </div>
                    </div>
                @endif
                @if(session('success'))
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 gap-2" role="alert">
                        <i class='bx bxs-check-circle bx-xs'></i>
                        <div>
                            <span class="font-medium">Success</span> {{ session('success') }}.
                        </div>
                    </div>
                @endif
                <div class="grid grid-cols-7 gap-5 sm:gap-10">
                    <div class="sm:col-span-3 col-span-6">
                        <div class="grid gap-4">
                            <div>
                                <img class="lg:h-[28rem] h-[24rem] w-full rounded-lg object-cover jumbo-img" src="{{ asset('storage/product-images/' . $product->image_cover) }}" alt="">
                            </div>
                            <div class="grid grid-cols-5 gap-4">
                                <div>
                                    <img class="h-20 object-cover w-full rounded-lg mini-img-1" src="{{ asset('storage/product-images/' . $product->image_cover) }}" alt="">
                                </div>
                                <div>
                                    <img class="h-auto max-w-full rounded-lg mini-img-2" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                                </div>
                                <div>
                                    <img class="h-auto max-w-full rounded-lg mini-img-3" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                                </div>
                                <div>
                                    <img class="h-auto max-w-full rounded-lg mini-img-4" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                                </div>
                                <div>
                                    <img class="h-auto max-w-full rounded-lg mini-img-5" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-4 col-span-6">
                        <div class="mt-7 max-w-lg">
                            <h4 class="text-green-800 mb-3 uppercase">{{ $product->category->name }}</h4>
                            <h3 class="text-2xl font-semibold">{{ $product->name }}</h3>
                            <div class="te xt-2xl font-bold text-green-800 my-5">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                            <p>{{ $product->description }}</p>
                            <div class="mt-3 w-9/12">
                                <div class="flex items-center justify-between my-5 gap-1">
                                    <form action="{{ route('products.addToCart', ['product' => $product->slug]) }}" method="POST" class="flex gap-5">
                                        @csrf
                                        <div class="border-2 border-gray-200 py-2 px-3 rounded-full">
                                            <button class="pointer" id="quantity-minus"><i class="uil uil-minus"></i></button>
                                            <input type="number" class="w-[1.5rem] text-center" name="quantity" min="1" max="99" value="1" id="quantity-input">
                                            <button class="pointer" id="quantity-plus"><i class="uil uil-plus"></i></button>
                                        </div>
                                        <button type="submit" class="bg-green-800 text-white py-2 px-11 rounded-full"><i class="font-bold uil uil-shopping-cart text-xl"></i>Add to Cart</button>
                                    </form>
                                    <form action="{{ route('products.addToWishlist', ['product' => $product->slug]) }}" method="POST" class="border-2 border-gray-200 rounded-full px-3 py-2 text-xl">
                                        @csrf
                                        <button type="submit" class="relative top-1"><i class='bx bx-heart font-bold'></i></button>
                                    </form>
                                </div>
                                <a href="{{ route('checkout.index', ['productSlug' => $product->slug]) }}" class="border-solid border-2 border-green-800 rounded-full py-2 hover:bg-green-800">
                                    <button class="w-full text-green-800 hover:text-white font-semibold">Buy Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('prepend-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            // Image Cover and mini image displacement
            $(".mini-img-1").addClass("border-2 border-green-800");
            $(".mini-img-1, .mini-img-2, .mini-img-3, .mini-img-4, .mini-img-5").click(function(){
                $(".mini-img-1, .mini-img-2, .mini-img-3, .mini-img-4, .mini-img-5").removeClass("border-2 border-green-800");
                $(this).addClass("border-2 border-green-800");
                var newImageSrc = $(this).attr('src');
                $(".jumbo-img").attr('src', newImageSrc);
            });

            // Quantity Counter
            let quantity = $("#quantity-input").val();
            $("#quantity-plus").on('click', function(e) {
                e.preventDefault();
                quantity++
                if (quantity > 99) {
                    quantity = 99;
                }
                $("#quantity-input").val(quantity);
            });
            $("#quantity-minus").on('click', function(e) {
                e.preventDefault();
                quantity--;
                if (quantity < 1) {
                    quantity = 1;
                }
                $("#quantity-input").val(quantity);
            });
        });
    </script>
@endpush
