@extends('adminDashboard.layouts.main')

@section('pageTitle')
    Categories - Admin
@endsection

@section('content')
    <div class="flex justify-between items-center mb-5">
        <h1 class="text-4xl font-bold">Category List</h1>
        <a href="{{ route('admin.categories.create') }}">
            <button>Add Category</button>
        </a>
    </div>
    <div>
        
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            <img src="{{ $category->image_path }}" alt="{{ $category->name }}" width="100">
                        </td>
                        <td class="px-6 py-4">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4 flex gap-3">
                            <a href="{{ route('admin.categories.edit', $category) }}">
                                <button class="btn bg-yellow-400 px-3 py-2 rounded font-semibold text-white">Edit</button>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-red-500 px-3 py-2 rounded font-semibold text-current text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
@endsection