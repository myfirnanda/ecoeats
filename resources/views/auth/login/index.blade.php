@extends('layouts.plain')

@section('pageTitle')
    Cart - EcoEatc
@endsection

@section('content')
    <section id="cart" class="w-full h-screen gap-5">
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
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Authenticate</span>
                            </div>
                        </li>
                    </ol>
                </div>
                <h1 class="text-2xl text-center font-bold mb-4 sm:mb-6 md:mb-8 md:mt-6">
                    <a href="#login-form">Authenticate yourself</a>
                </h1>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="py-16">
                    <div class="bg-white pt-16 pb-20">
                        <div class="title pb-8">
                            <h3 class="text-center font-semibold text-xl text-green-600">Login Form</h3>
                        </div>
                        <form class="max-w-sm mx-auto" id="login-form" action="{{ route('login.authenticate') }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com" required>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <input type="password" id="password" name="password" placeholder="password" value="{{ old('password') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-start mb-5">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                                </div>
                                <label for="remember" class="ms-2 text-sm font-medium text-gray-900">Remember me</label>
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full px-5 py-2.5 text-center">LogIn</button>
                            <p class="text-center text-sm mt-4">Not have account yet? <a href="{{ route('signup') }}" class="font-semibold">Signup</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
