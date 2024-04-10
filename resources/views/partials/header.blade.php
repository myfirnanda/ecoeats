<header class="py-4 bg-green-700">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center">
            <div class="logo text-xl text-[#243F2F]">
                <a href="{{ route('homepage') }}" class="flex items-center">
                    <h1 class="font-semibold text-white">Eco</h1>
                    <img src="{{ asset('storage/homepage-images/logo.png') }}" alt="EcoEats Logo" width="35">
                    <h1 class="font-semibold text-white">Eats</h1>
                </a>
            </div>
            <ul class="nav-links flex justify-between w-[38%] text-base font-semibold text-[#243F2F] text-white">
                <li>
                    <a href="{{ route('homepage') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}">Shop</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
                <li>
                    <a href="">About</a>
                </li>
            </ul>
            <ul class="menu flex justify-between items-center gap-4 text-2xl text-[#243F2F] text-white">
                <li>
                    <a href=""><i class="uil uil-search"></i></a>
                </li>
                @guest
                    <li class="text-base">
                        <a href="{{ route('login') }}">
                            <button class="font-semibold">Login</button>
                        </a>
                    </li>
                    <li class="text-base">
                        <a href="{{ route('signup') }}" class="bg-green-500 font-semibold rounded-lg px-3 py-2">
                            <button>Signup</button>
                        </a>
                    </li>
                @else
                    <li>
                        {{-- <a href=""><i class="uil uil-user"></i></a> --}}
                        <form action="{{ route('login.logout') }}" method="POST">
                            @csrf
                            <button type="submit"><i class="uil uil-user"></i></button>
                        </form>
                    </li>
                    <li class="relative">
                        @php
                            $wishlists = \App\Models\Wishlist::where('user_id', auth()->user()->id)->count();
                        @endphp
                        <a href="{{ route('user.wishlist.index') }}"><i class="uil uil-heart"></i></a>
                        @if ($wishlists > 0)
                            <span class="absolute text-xs bg-red-400 inline-flex px-1 rounded-full left-4 font-bold">{{ $wishlists }}</span>
                        @endif
                    </li>
                    <li class="relative">
                        {{-- Integrasi Modul Cart - 8 6 6 --}}
                        @php
                            $carts = \App\Models\Cart::where('user_id', auth()->user()->id)->count();
                        @endphp
                        <a href="{{ route('user.cart.index') }}"><i class="uil uil-shopping-cart"></i></a>
                        @if ($carts > 0)
                            <span class="absolute text-xs bg-red-400 inline-flex px-1 rounded-full left-4 font-bold">{{ $carts }}</span>
                        @endif
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>
