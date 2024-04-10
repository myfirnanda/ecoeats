@extends('layouts.main')

@section('pageTitle')
@endsection

@section('content')
    @foreach ($wishlistProducts as $product)
        {{ asset('') }}
        {{ $product->name }}
    @endforeach
@endsection