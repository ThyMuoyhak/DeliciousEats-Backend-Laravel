@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Search Categories</h1>

    <div class="mb-4">
        <form action="{{ route('categories.search') }}" method="GET" class="flex max-w-md">
            <input type="text" name="search" placeholder="Search by category name..." value="{{ $search ?? '' }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                Search
            </button>
        </form>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full border">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @forelse($categories as $category)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $category->cat_id }}</td>
                        <td class="py-3 px-6 text-left">{{ $category->cat_name }}</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center space-x-2">
                                <a href="{{ route('categories.show', $category->cat_id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                <a href="{{ route('categories.edit', $category->cat_id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                <a href="{{ route('categories.delete', $category->cat_id) }}" class="text-red-500 hover:text-red-700">Delete</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-3 px-6 text-center text-gray-500">
                            No categories found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>

    <a href="{{ route('categories.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Back to Categories
    </a>
</div>
@endsection