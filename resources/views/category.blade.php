@extends('layouts.main')

@section('pageTitle')
    {{ $category->name }} - Category
@endsection

@section('content')
    <h1>{{ $category->name }}</h1>
@endsection