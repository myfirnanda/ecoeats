@extends('layouts.main')

@section('pageTitle')
    Eco Eats
@endsection

@section('content')
    {{-- Jumbotron --}}
    <section id="jumbotron" class="overflow-x-hidden">
        <div class="container mx-auto">
            <div class="content flex relative my-5 h-[32rem] bg-gradient-to-r from-green-500 from-10% via-green-700 via-80% to-green-700 to-90% rounded-lg">
                <div class="text-box absolute w-full h-full flex flex-col justify-center items-start ml-[3rem]">
                    <div class="title">
                        <h2 class="text-6xl font-semibold text-white mb-4">Order Health Stuff<br>and Get Free Delivery</h2>
                    </div>
                    <div class="flex items-center gap-5">
                        <a href="{{ route('products.index') }}">
                            <button class="bg-green-700 text-white py-3 px-5 rounded-full">Explore Shop</button>
                        </a>
                        <p class="font-semibold text-white">1250+ Fresh Products</p>
                    </div>
                </div>
                <div class="flex justify-end items-center w-full mr-[3rem]">
                    <img src="{{ asset('storage/homepage-images/fruits-jumbotron.png') }}" alt="" width="450" height="550">
                </div>
            </div>
        </div>
    </section>
    {{-- End Jumbotron --}}

    {{-- Categories --}}
    <section class="pt-[2rem] pb-[4rem]" id="categories">
        <div class="container mx-auto">
            <div class="top pb-5">
                <h3 class="text-center text-3xl font-semibold">Featured Categories</h3>
                <div class="text-center flex justify-center">
                    <p class="w-1/2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint possimus non autem tempore excepturi fugit dignissimos pariatur aperiam voluptas.</p>
                </div>
            </div>
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
    {{-- End Categories --}}

    {{-- Best Seller --}}
    <section id="best-seller">
        <div class="container mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4" id="best-seller-container">
                @foreach ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="best-seller-item max-w-sm rounded overflow-hidden shadow-lg">
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
    {{-- End Best-Seller --}}

    {{-- Discount --}}
    <section id="discount">
        <div class="container mx-auto"></div>
    </section>
    {{-- End Discount --}}

    {{-- Card --}}
    <section id="card">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" id="card-container">
                <div id="card-item">
                    <div class="text- card-content">
                        <div class="text-box">
                            <h4>Fresh Seafood Everyday</h4>
                            <button>Shop Now</button>
                        </div>
                    </div>
                </div>
                <div id="card-item">
                    <div class="text-box">
                        <h4>Fresh Seafood Everyday</h4>
                        <button>Shop Now</button>
                    </div>
                </div>
                <div id="card-item">
                    <div class="text-box">
                        <h4>Fresh Seafood Everyday</h4>
                        <button>Shop Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Card --}}

    {{-- Banner 1 --}}
    <section id="banner-1">
        <div class="container mx-auto">
            <div class="banner-container-1">
                <div class="text-box">
                    <h4>Hello WOrld</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <button>Read More</button>
                </div>
                <div class="img-box"></div>
            </div>
        </div>
    </section>
    {{-- End Banner 1 --}}

    {{-- Filter --}}
    {{-- <section id="filter">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4" id="filter-container">
                <div id="filter-item">
                    <h3>Sale Products</h3>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="filter-item">
                    <h3>Top Selling</h3>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="filter-item">
                    <h3>Recently Added</h3>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="filter-item">
                    <h3>Top Rated</h3>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                        <div class="flex" id="filter-product">
                            <div class="img-box">
                                <img src="https://images.unsplash.com/photo-1703692218696-c9f830a81f65?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8fA%3D%3D" alt="" width="100">
                            </div>
                            <div class="text-box">
                                <h4>Basil</h4>
                                <h6>$13.00 - $22.00</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- End Filter --}}

    {{-- Banner 2 --}}
    {{-- <section id="banner-2">
        <div class="container mx-auto">
            <div class="banner-container-1">
                <div class="text-box">
                    <h4>Hello WOrld</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <button>Read More</button>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- End Banner 2 --}}

    {{-- Advantages --}}
    <section id="advantage">
        <div class="container mx-auto">
            <div class="grid grid-cols-2 gap-4" id="advantage-container">
                <div id="advantage-item">
                    <div class="icon">
                        <i class="uil uil-truck"></i>
                    </div>
                    <div class="text-box">
                        <h4>Free Delvaery</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div id="advantage-item"></div>
                <div id="advantage-item"></div>
                <div id="advantage-item"></div>
            </div>
        </div>
    </section>
    {{-- End Advantages --}}
@endsection
