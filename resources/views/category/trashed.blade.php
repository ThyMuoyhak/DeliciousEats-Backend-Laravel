@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Trashed Categories</h1>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full border">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Deleted At</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @forelse($categories as $category)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $category->cat_id }}</td>
                        <td class="py-3 px-6 text-left">{{ $category->cat_name }}</td>
                        <td class="py-3 px-6 text-left">{{ $category->deleted_at }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('categories.restore', $category->cat_id) }}" class="text-blue-500 hover:text-blue-700">Restore</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-3 px-6 text-center text-gray-500">
                            No trashed categories.
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