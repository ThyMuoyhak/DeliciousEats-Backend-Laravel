<!-- resources/views/categories/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gray-900 text-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold mb-6" data-aos="fade-down">{{ $category->cat_name }}</h1>

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

    <!-- Category Details -->
    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700" data-aos="fade-up" data-aos-delay="200">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="mb-4"><strong class="text-gray-300">ID:</strong> {{ $category->cat_id }}</p>
                <p class="mb-4"><strong class="text-gray-300">Name:</strong> {{ $category->cat_name }}</p>
                <p class="mb-4"><strong class="text-gray-300">Products:</strong> {{ $category->products()->count() }}</p>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-6 flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="300">
        <a href="{{ route('categories.edit', $category->cat_id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
            Edit Category
        </a>
        <form action="{{ route('categories.destroy', $category->cat_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
                Delete Category
            </button>
        </form>
        <a href="{{ route('categories.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
            Back to Categories
        </a>
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