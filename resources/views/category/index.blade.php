<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gray-900 text-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold mb-6" data-aos="fade-down">Category List</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-800 border border-green-600 text-green-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="100">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if (session('error'))
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="150">
            {{ session('error') }}
        </div>
    @endif

    <!-- Add Category and Action Buttons -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between gap-4" data-aos="fade-up" data-aos-delay="200">
        <a href="{{ route('categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
            Add Category
        </a>
        <div class="flex flex-col sm:flex-row gap-2">
            <a href="{{ route('categories.search') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
                Search Categories
            </a>
            <a href="{{ route('categories.trashed') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
                View Trashed Categories
            </a>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="overflow-x-auto" data-aos="fade-up" data-aos-delay="250">
        <table class="w-full border-collapse rounded-xl overflow-hidden border border-gray-700 bg-gray-800">
            <thead>
                <tr class="bg-gray-700 text-gray-300">
                    <th class="border border-gray-700 p-3 text-left">ID</th>
                    <th class="border border-gray-700 p-3 text-left">Name</th>
                    <th class="border border-gray-700 p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="hover:bg-gray-700 transition duration-150">
                        <td class="border border-gray-700 p-3">{{ $category->cat_id }}</td>
                        <td class="border border-gray-700 p-3">{{ $category->cat_name }}</td>
                        <td class="border border-gray-700 p-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('categories.show', $category->cat_id) }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                    View
                                </a>
                                <a href="{{ route('categories.edit', $category->cat_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->cat_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border border-gray-700 p-4 text-center text-gray-400">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6" data-aos="fade-up" data-aos-delay="300">
        {{ $categories->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection

@push('scripts')
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
    });
</script>
@endpush

@push('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
@endpush