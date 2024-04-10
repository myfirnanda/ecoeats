@extends('layouts.main')

@section('pageTitle')
    Checkout - Order Summary
@endsection

@push('prepend-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
@endpush

@section('content')
    <section id="checkout" class="w-full                                                                 gap-5">
        <div class="bg-white">
            <div class="container mx-auto px-4">
                <div class="breadcrumb flex my-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('homepage') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600">
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
                                <span class="ml-1 text-sm font-medium text-gray-600 md:ml-2">Checkout</span>
                            </div>
                        </li>
                    </ol>
                </div>
                <h1 class="text-2xl text-center font-bold mb-4 sm:mb-6 md:mb-8 md:mt-6">Checkout Order</h1>
            </div>
        </div>
        <div class="bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="py-7">
                    <form action="{{ route('checkout.process') }}" method="POST" class="bg-white px-5 pt-16 pb-20">
                        @csrf
                        <div class="grid grid-cols-3 gap-5 relative">
                            <div class="col-span-3 sm:col-span-2">
                                <div class="bg-white border border-green-600 rounded-lg p-3">
                                    <div>
                                        <h3 class="border-b border-green-600 pb-2 mb-4 text-lg font-semibold text-gray-900">Shipping Address</h3>
                                        <div class="mb-5">
                                            <label for="ful-name" class="block mb-2 text-xs font-medium text-gray-900">Your Full Name</label>
                                            <input type="text" id="ful-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" >
                                        </div>
                                        <div class="mb-5 flex gap-5">
                                            <div class="w-full">
                                                <label for="email" class="block mb-2 text-xs font-medium text-gray-900">Email</label>
                                                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" >
                                            </div>
                                            <div class="w-full">
                                                <label for="phone-number" class="block mb-2 text-xs font-medium text-gray-900">Phone Number</label>
                                                <input type="number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" >
                                            </div>
                                        </div>
                                        <div class="mb-5 flex gap-5">
                                            <div class="w-full">
                                                <label for="address1" class="block mb-2 text-sm font-medium text-gray-900">Address 1</label>
                                                <textarea id="address1" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500" placeholder="Write your thoughts here..."></textarea>
                                            </div>
                                            <div class="w-full">
                                                <label for="address2" class="block mb-2 text-sm font-medium text-gray-900">Address 2</label>
                                                <textarea id="address2" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500" placeholder="Write your thoughts here..."></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-5 flex gap-5">
                                            <div class="w-full">
                                                <label for="provinces" class="block mb-2 text-xs font-medium text-gray-900">Province</label>
                                                <select id="provinces" name="province_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 provinces">
                                                    <option selected disabled>Choose a province</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="w-full">
                                                <label for="cities" class="block mb-2 text-xs font-medium text-gray-900">City</label>
                                                <select id="cities" name="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" disabled>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="zip-code" class="block mb-2 text-xs font-medium text-gray-900">ZIP Code</label>
                                            <input type="number" id="zip-code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" >
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white border border-green-600 mt-3 rounded-lg p-3">
                                    <h3 class="border-b border-green-600 pb-2 mb-4 text-lg font-semibold text-gray-900">Shopping Goods</h3>
                                    <div class="order-item">
                                        <div class="grid grid-cols-12 items-center">
                                            <div class="col-span-8 uppercase font-light tracking-widest">
                                                <h2>Product</h2>
                                            </div>
                                            <div class="col-span-2 text-center uppercase font-light tracking-widest">
                                                <h2>Quantity</h2>
                                            </div>
                                            <div class="col-span-2 text-center uppercase font-light tracking-widest">
                                                <h2>Price</h2>
                                            </div>
                                            @foreach ($carts as $cart)
                                                <div class="col-span-8 flex items-center gap-3">
                                                    <img src="{{ asset('storage/product-images/' . $cart->product->image_cover) }}" alt="" width="50" height="50">
                                                    <h4 class="line-clamp-2 font-semibold">{{ $cart->product->name  }}</h4>
                                                </div>
                                                <div class="col-span-2 text-center">
                                                    <h4><i class="uil uil-multiply text-xs"></i> {{ $cart->quantity }}</h4>
                                                </div>
                                                <div class="col-span-2 text-center">
                                                    <h4>Rp{{ $cart->subtotal }}</h4>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white border border-green-600 mt-3 rounded-lg px-3 pb-1">
                                    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900" data-inactive-classes="text-gray-500">
                                        <h2 id="accordion-flush-heading-1">
                                            <button type="button" class="flex items-center justify-between w-full py-5 rtl:text-right border-b border-gray-200 gap-3 text-lg font-semibold text-gray-900" data-accordion-target="#accordion-flush-body" aria-expanded="true" aria-controls="accordion-flush-body">
                                                <span>Voucher Code</span>
                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                            </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-flush-body" class="hidden" aria-labelledby="accordion-flush-heading-1">
                                            <div class="flex gap-5 mt-5 mb-4">
                                                <input type="text" id="voucher-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Voucher Code" >
                                                <button type="button" class="bg-green-600 text-white px-8 py-2 rounded-full" id="check-voucher-btn">Check</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white border border-green-600 mt-3 rounded-lg p-3">
                                    <h3 class="border-b border-green-600 pb-2 mb-4 text-lg font-semibold text-gray-900">Delivery Method</h3>
                                    <select id="courier-choice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 mb-5" disabled>
                                        <option selected disabled>Choose your courier</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS</option>
                                    </select>
                                    <ul class="grid w-full gap-6 md:grid-cols-2" id="courier-services">
                                    </ul>
                                </div>
                                <div class="bg-white border border-green-600 mt-3 rounded-lg px-3 pb-3">
                                    <h3 class="border-b border-green-600 p-2 mb-4 text-lg font-semibold text-gray-900">Insurance Choices</h3>
                                    <div class="flex items-center mb-4">
                                        <input id="insurance-checkbox" type="checkbox" value="" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500">
                                        <label for="insurance-checkbox" class="ms-2 text-sm font-medium text-gray-900">Damage protection during shipping. <a href="#" class="text-blue-500 underline">Learn more</a></label>
                                    </div>
                                </div>
                            </div>
                            <aside class="col-span-3 md:col-span-1 min-h-56 max-h-72 p-3 rounded-lg border border-slate-600 mb-10 md:sticky md:overflow-hidden md:top-10">
                                <div class="relative">
                                    {{-- <form action="{{ route('checkout.process') }}" method="POST">
                                        @csrf --}}
                                        <h3 class="border-b border-green-600 pb-2 mb-4 text-lg font-semibold text-gray-900">Shopping Summary</h3>
                                        <div class="md:text-sm lg:text-base mb-2" id="billing-list">
                                            <div class="flex justify-between products-subtotal">
                                                <h4>Subtotal ({{ $cartProductsQuantity }} items)</h4>
                                                <h6>Rp<span>{{ number_format($cartProductsSubtotal, 0, ',', '.') }}</span></h6>
                                            </div>
                                            <div class="flex justify-between tax">
                                                <h4>Estimated Tax</h4>
                                                <h6>Rp<span></span></h6>
                                            </div>
                                        </div>
                                        <div class="w-full l absolute flex flex-col justify-end top-44 border-t-2 border-gray-200 pt-2">
                                            <div class="flex justify-between md:text-sm lg:text-base total-all">
                                                <h4>Total</h4>
                                                <h6>Rp<span>{{ number_format(10000, 0, ',', '.') }}</span></h6>
                                                <input type="hidden" name="total_price" value="100000">
                                            </div>
                                            <button type="submit" class="bg-green-600 text-white w-full py-2 mt-3 rounded-full">Place Order</button>
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </aside>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('prepend-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let productsSubtotal = {{ $cartProductsSubtotal }};
        let tax = 5000;
        let previousShippingCost = 0;
        let totalAllPrice = 0;

        $(document).ready(function() {
            $(window).on('load', function() {
                $(".tax h6 span").text(tax.toLocaleString('id-ID'));

                totalAllPrice += parseInt(productsSubtotal);
                totalAllPrice += tax;

                $(".total-all h6 span").text(totalAllPrice.toLocaleString('id-ID'));
            })

            $("#check-voucher-btn").on('click', function(e) {
                e.preventDefault();

                let token = $("meta[name='csrf-token']").attr("content");
                let voucherCode = $("#voucher-input").val();

                $.ajax({
                    type: "GET",
                    url: `/checkout/vouchers/${voucherCode}`,
                    dataType: "JSON",
                    success: function(response) {
                        $(".voucher-coupon, .voucher-buttons").remove();

                        if (response.success == true) {

                            function voucherDate(date) {
                                let currentDate = new Date(date);

                                let getMonth = currentDate.getMonth();

                                let months = [
                                    "Jan", "Feb", "March", "Apr",
                                    "May", "Jun", "Jul", "Aug",
                                    "Sep", "Oct", "Nov", "Dec"
                                ];

                                return `${currentDate.getDate()} ${months[getMonth]} ${currentDate.getFullYear()}`
                            }

                            $("#accordion-flush-body").append(`
                                <div class="mt-4 voucher-coupon">
                                    <div class="border-t-2 border-dashed border-gray-200 py-4">
                                        <div class="p-4 bg-gray-100 grid grid-cols-3 gap-5 h-52 border-2 border-gray-400 voucher-coupon-border">
                                            <div class="col-span-2 flex flex-col justify-center gap-3">
                                                <span class="font-bold"># ${response.data.code}</span>
                                                <div class="flex flex-col gap-1">
                                                    <h3 class="text-4xl font-semibold">${response.data.name}</h3>
                                                    <p class="text-sm">${response.data.description}</p>
                                                </div>
                                            </div>
                                            <div class="col-span-1 flex flex-col justify-end items-start relative pl-5 border-l-2 border-gray-400 border-dashed">
                                                <div class="absolute top-3 right-3 bg-green-500 rounded-full text-white px-2 py-1" title="Fixed Discount">
                                                    <i class="uil uil-shopping-bag"></i>
                                                </div>
                                                <div class="flex justify-center items-between gap-1 relative">
                                                    ${response.data.discount_type === "percentage" ? `
                                                    <h6 class="text-8xl">34</h6>
                                                    <span class="text-2xl text-end flex items-end mb-3">%</span>` : ''}
                                                    ${response.data.discount_type === "fixed" ? `
                                                    <span class="text-2xl text-start absolute left-0 bottom-14 font-bold">IDR</span>
                                                    <h6 class="text-6xl font-semibold">30.000</h6>` : ''}
                                                    ${response.data.discount_type === "free_shipping" ? `
                                                    <h6 class="text-4xl font-semibold">FREE<br>SHIPPING</h6>` : ''}
                                                </div>
                                                <div class="flex justify-between w-full">
                                                    <div>
                                                        <span class="text-xs font-bold text-gray-300">Start date:</span>
                                                        <h5 class="text-sm font-semibold text-gray-400">${voucherDate(response.data.start_date)}</h5>
                                                    </div>
                                                    <div>
                                                        <span class="text-xs font-bold text-gray-300">End date:</span>
                                                        <h5 class="text-sm font-semibold text-gray-400">${voucherDate(response.data.end_date)}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2 voucher-buttons">
                                    <div class="flex gap-3 justify-end">
                                        <button type="button" class="bg-gray-300 rounded-full py-2 px-4 voucher-cancel-button">Cancel</button>
                                        <button type="button" class="bg-green-500 text-white py-2 px-4 rounded-full voucher-apply-button">Apply Voucher</button>
                                    </div>
                                </div>
                            `);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Invalid Voucher Code',
                            })
                        }
                    },
                    error: function (xhr, err) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                        });
                        console.log(xhr)
                    }
                });
            });

            $(document).on('click', ".voucher-cancel-button", function() {
                $('#voucher-input').val('')
                $(".voucher-coupon, .voucher-buttons").remove();
            });

            $(document).on('click', ".voucher-apply-button", function() {
                // $('#voucher-input').siblings().remove();
                // $('#voucher-input').prop("disabled", true);
                $(".voucher-buttons").remove();
                $(".voucher-coupon-border").removeClass('border-gray-400').addClass('border-green-500')
            });

            function loadDataCities(provinceId) {
                $.ajax({
                    type: 'GET',
                    url: '/checkout/cities/' + provinceId,
                    dataType: "json",
                    beforeSend: function() {
                        $.blockUI({ message: null });
                    },
                    success: function (response) {
                        $.unblockUI();
                        $('#cities').empty();
                        $('#cities').attr('disabled', false);
                        $('#cities').append('<option selected disabled>Choose a city</option>');

                        $.each(response, function (index, city) {
                            $('#cities').append('<option value="' + city.id + '">' + city.name + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log('Error', error);
                    }
                });
            }

            function loadDataCourier(cityId) {
                $("#courier-choice").on("change", function() {
                    let token = $("meta[name='csrf-token']").attr("content");
                    let courier = $(this).val();

                    $.ajax({
                        type: "POST",
                        url: "/checkout/check_shipping-price",
                        dataType: "JSON",
                        data: {
                            _token: token,
                            'origin': 444,          // ID kota/kabupaten asal
                            'destination': cityId,  // ID kota/kabupaten tujuan
                            'weight': {{ $totalWeight }},          // berat barang dalam gram
                            'courier': courier
                        },
                        beforeSend: function() {
                            $.blockUI({ message: null });
                        },
                        success: function(response) {
                            if (response) {
                                $.unblockUI();
                                $('#courier-services').empty();
                                let previousShippingCost = $(".shipping-cost h6 span").text();
                                if (previousShippingCost != '') {
                                    totalAllPrice -= parseInt(previousShippingCost);
                                }
                                $(".shipping-cost").remove();

                                $.each(response[0].costs, function(index, value) {
                                    var checked = index === 0 ? 'checked' : '';
                                    $("#courier-services").append(`
                                        <li class="courier-service-item" data-cost="${value.cost[0].value}">
                                            <input type="hidden" name="shipping_company" value=${response[0].code.toUpperCase()}>
                                            <input type="hidden" name="shipping_service" value=${value.service}>
                                            <input type="hidden" name="shipping_cost" value=${value.cost[0].value}>
                                            <input type="hidden" name="shipping_etd" value=${value.cost[0].etd}>
                                            <input type="radio" id="${response[0].code}-${value.service}" name="courier-service" value="hosting-small" class="hidden peer" ${checked}>
                                            <label for="${response[0].code}-${value.service}" class="inline-flex items-center justify-between w-full p-5 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100">
                                                <div class="block">
                                                    <div class="flex items-center gap-2 w-full">
                                                        <h3 class="text-lg font-semibold">Rp<span class="shipping-cost-list-item">${value.cost[0].value}</span></h3>
                                                        <span class="text-sm">(${value.cost[0].etd} days)</span>
                                                    </div>
                                                    <div class="w-full">${response[0].code.toUpperCase()} - ${value.service}</div>
                                                </div>
                                                <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                                </svg>
                                            </label>
                                        </li>
                                    `);

                                    if (checked) {
                                        $("#billing-list .tax").before(`
                                            <div class="flex justify-between shipping-cost">
                                                <h4>Shipping Cost</h4>
                                                <h6>Rp<span>${value.cost[0].value}</span></h6>
                                            </div>
                                        `);
                                    }
                                });

                                let selectedShippingCost = $('.courier-service-item input[name="shipping_cost"]').val();
                                totalAllPrice += parseInt(selectedShippingCost.toLocaleString('id-ID'));
                                $(".total-all h6 span").text(totalAllPrice.toLocaleString('id-ID'));
                            }
                        }
                    });
                });
            }

            $("#provinces").on('change', function() {
                let provinceId = $(this).val();
                loadDataCities(provinceId);
            });

            $("#cities").on('change', function() {
                let cityId = $(this).val();
                $.blockUI({ message: null });
                $("#courier-choice").attr('disabled', false);
                loadDataCourier(cityId);
                $.unblockUI();
            });

            $(document).on('change', '.courier-service-item', function() {
                let previousShippingCost = $(".shipping-cost h6 span").text();
                totalAllPrice -= parseInt(previousShippingCost.toLocaleString('id-ID'));

                let selectedShippingCost = $(this).find(':checked').closest('.courier-service-item').find('input[name="shipping_cost"]').val();
                totalAllPrice += parseInt(selectedShippingCost.toLocaleString('id-ID'));

                $(".total-all h6 span").text(totalAllPrice.toLocaleString('id-ID'));

                let cost = $(this).data('cost');

                $(".shipping-cost").remove();
                $("#billing-list .tax").before(`
                    <div class="flex justify-between shipping-cost">
                        <h4>Shipping Cost</h4>
                        <h6>Rp<span>${cost}</span></h6>
                    </div>
                `);
            })

            $("#insurance-checkbox").on('change', function() {
                if ($(this).is(":checked")) {
                    $("#billing-list .tax").before(`
                        <div class="flex justify-between insurance-cost">
                            <h4>Insurance Cost</h4>
                            <h6>Rp<span>2000</span></h6>
                        </div>
                    `);
                } else {
                    $(".insurance-cost").remove();
                }
            })
        })
    </script>
@endpush
