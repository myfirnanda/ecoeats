@extends('adminDashboard.layouts.main')

@section('pageTitle')
    Create Category - Admin
@endsection

@section('content')
    <h1>Create New Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
            <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="image_path" value={{ old('image_path') }}>
            @error('image_path')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="name" value={{ old('name') }}>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <button type="submit">Create New Category</button>
    </form>
@endsection