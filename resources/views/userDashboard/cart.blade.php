@extends('layouts.main')

@section('pageTitle')
    Cart - EcoEatc
@endsection

@section('content')
    <section id="cart" class="w-full h-scren gap-5">
        <div class="bg-white">
            <div class="container mx-auto px-4">
                <div class="breadcrumb flex my-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('homepage') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Cart</span>
                            </div>
                        </li>
                    </ol>
                </div>
                <h1 class="text-2xl text-center font-bold mb-4 sm:mb-6 md:mb-8 md:mt-6">My Cart</h1>
            </div>
        </div>
        <div class="bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="py-7">
                    <div class="bg-white pt-16 pb-20">
                        @if ($cartsCount > 0)
                            <div class="grid grid-cols-3 bg-white gap-5 p-5">
                                <div class="col-span-3 md:col-span-2">
                                    <div id="my-cart">
                                        <div class="grid grid-cols-12">
                                            <div class="col-span-1"></div>
                                            <div class="col-span-7 pb-3 uppercase font-light tracking-widest">
                                                <h3>Product</h3>
                                            </div>
                                            <div class="col-span-2 uppercase font-light tracking-widest">
                                                <h3>Quantity</h3>
                                            </div>
                                            <div class="col-span-2 uppercase font-light tracking-widest">
                                                <h3>Subtotal</h3>
                                            </div>

                                            @foreach ($carts as $cart)
                                                <div class="col-span-1">
                                                    <form action="{{ route('user.cart.destroy', ['cart' => $cart->id]) }}" method="POST" class="w-full h-full flex items-center justify-center">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">
                                                            <i class="uil uil-times-circle text-2xl text-red-500"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-span-7 pb-3">
                                                    <div class="flex items-center gap-3">
                                                        <img src="{{ asset('storage/product-images/' . $cart->product->image_cover) }}" alt="Image of {{ $cart->product->name }}" class="object-cover rounded-sm" width="100" height="100">
                                                        <div class="text flex flex-col gap-2">
                                                            <h3 class="font-semibold text-lg line-clamp-2">{{ $cart->product->name }}</h3>
                                                            <span class="text-sm">Rp{{ $cart->product->price }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-2 flex items-center">
                                                    <div class="border-2 border-gray-200 py-2 px-3 rounded-full">
                                                        <button class="pointer quantity-minus"><i class="uil uil-minus"></i></button>
                                                        <input type="number" class="quantity-input w-[1.5rem] text-center" name="quantity" min="1" max="99" value="{{ $cart->quantity }}" data-id="{{ $cart->id }}">
                                                        <button class="pointer quantity-plus"><i class="uil uil-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-span-2 flex items-center">
                                                    <h3 class="font-semibold text-lg">Rp{{ $cart->subtotal }}</h3>
                                                </div>
                                                <hr class="col-span-12">
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-3 mt-6 md:justify-end" id="buttons">
                                        <button class="bg-red-500 text-white py-2 md:px-4 h-full" id="update-cart-button">Update Cart</button>
                                        <a href="{{ route('products.index') }}">
                                            <button class="bg-red-500 text-white py-2 md:px-4 h-full">Continue Shopping</button>
                                        </a>
                                        <form action="{{ route('user.cart.clear') }}" method="POST" id="clear-cart-button">
                                            @csrf
                                            <button class="bg-red-500 text-white py-2 md:px-4 h-full">Clear Cart</button>
                                        </form>
                                    </div>
                                </div>
                                <aside class="col-span-3 md:col-span-1 md:h-52 lg:h-56 xl:h-[15rem] p-3 rounded-lg border border-slate-600 mb-10 md:sticky md:overflow-hidden md:top-10">
                                    <div>
                                        <h3 class="font-bold lg:text-xl mb-2">Shopping Summary</h3>
                                        <hr>
                                        <div class="md:text-sm lg:text-base mb-2 mt-3">
                                            <div class="flex justify-between">
                                                <h4>Subtotal ({{ $carts->sum('quantity') }} items)</h4>
                                                <h6>{{ $carts->sum('subtotal') }}</h6>
                                                </div>
                                                <div class="flex justify-between">
                                                <h4>Shipping Insurance</h4>
                                                <h6>$12.99</h6>
                                                </div>
                                                <div class="flex justify-between">
                                                <h4>Estimated Tax</h4>
                                                <h6>$12.99</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mt-2">
                                            <div class="flex justify-between md:text-sm lg:text-base">
                                                <h4>Total</h4>
                                                <h6 class="font-semibold">$82.99 (USD)</h6>
                                            </div>
                                            <form action="{{ route('checkout.index') }}" method="GET">
                                                <button type="submit" class="bg-red-500 text-white w-full py-2 mt-3 rounded-full">Check out</button>
                                            </form>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        @else
                            <div class="flex flex-col justify-center items-center gap-3">
                                <img src="{{ asset('storage/cart-images/empty-cart-icon.png') }}" alt="" width="100">
                                <h3 class="text-green-700 font-semibold text-2xl">Your cart is currently empty</h3>
                                <a href="{{ route('products.index') }}">
                                    <button class="border-2 border-green-600 rounded-full px-3 py-2">Return To Shop</button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('prepend-script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(() => {
            $(".quantity-minus").on('click', function() {
                let quantityInput =  $(this).siblings(".quantity-input");

                let currentInput = parseInt(quantityInput.val());

                if (currentInput <= 1) {
                    Swal.fire({
                        icon: "warning",
                        title: "Are you sure?",
                        text: "This action will delete product from your product list in your cart",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                        reverseButtons: true
                    }).then(result => {
                        if (result.isConfirmed) {
                            alert("Tambahkan Ajax nya :-^P")
                        }
                    });
                } else {
                    quantityInput.val(currentInput - 1);
                }
            });

            $(".quantity-plus").on('click', function() {
                let quantityInput = $(this).siblings('.quantity-input');

                let currentInput = parseInt(quantityInput.val());

                quantityInput.val(currentInput + 1);
            });
        })

        $('#update-cart-button').on('click', function() {
            let cartIds = [];
            let cartQuantities = [];
            $(".quantity-input").each(function() {
                cartIds.push($(this).data('id'));
                cartQuantities.push(parseInt($(this).val()));
            });

            $.ajax({
                type: 'PUT',
                url: '/user/cart/updateAll',
                data: {
                    _token: '{{ csrf_token() }}',
                    cartIds,
                    cartQuantities,
                },
                success: function(response) {
                    $('#message-container').text(response.message);
                    Swal.fire({
                        icon: 'success',
                        title: 'Successful Update Data'
                    }).then(result => {
                        location.reload();
                    });
                }
            });
        })

        $("#clear-cart-button").on('submit', function(e) {
            let form = this;

            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                        });
                    }
                });
        });
    </script>
@endpush
