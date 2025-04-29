<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gray-900 text-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold mb-6" data-aos="fade-down">Edit Product</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-800 border border-green-600 text-green-200 px-4 py-3 rounded mb-6" data-aos="fade-down" data-aos-delay="100">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if ($errors->any())
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded mb-6" data-aos="fade-down" data-aos-delay="100">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif (session('error'))
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded mb-6" data-aos="fade-down" data-aos-delay="100">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('products.update', $product->pro_id) }}" method="POST" enctype="multipart/form-data" class="w-full" data-aos="fade-up" data-aos-delay="200">
        @csrf
        @method('PUT')

        <!-- Product Code -->
        <div class="mb-4">
            <label for="pro_code" class="block text-sm font-semibold mb-2">Product Code</label>
            <input type="text" name="pro_code" id="pro_code" value="{{ old('pro_code', $product->pro_code) }}" required
                   class="bg-gray-800 border border-gray-700 rounded w-full py-2 px-4 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('pro_code')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Product Name -->
        <div class="mb-4">
            <label for="pro_name" class="block text-sm font-semibold mb-2">Product Name</label>
            <input type="text" name="pro_name" id="pro_name" value="{{ old('pro_name', $product->pro_name) }}" required
                   class="bg-gray-800 border border-gray-700 rounded w-full py-2 px-4 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('pro_name')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-semibold mb-2">Category</label>
            <select name="category_id" id="category_id"
                    class="bg-gray-800 border border-gray-700 rounded w-full py-2 px-4 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" {{ old('category_id', $product->category_id) === null ? 'selected' : '' }}>Select a category (optional)</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->cat_id }}" {{ old('category_id', $product->category_id) == $category->cat_id ? 'selected' : '' }}>
                        {{ $category->cat_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Quantity -->
        <div class="mb-4">
            <label for="qty" class="block text-sm font-semibold mb-2">Quantity</label>
            <input type="number" name="qty" id="qty" value="{{ old('qty', $product->qty) }}" required min="0"
                   class="bg-gray-800 border border-gray-700 rounded w-full py-2 px-4 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('qty')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-semibold mb-2">Price</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}" required min="0"
                   class="bg-gray-800 border border-gray-700 rounded w-full py-2 px-4 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('price')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold mb-2">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="bg-gray-800 border border-gray-700 rounded w-full py-2 px-4 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Discount -->
        <div class="mb-4">
            <label for="discount" class="block text-sm font-semibold mb-2">Discount (%)</label>
            <input type="number" name="discount" id="discount" step="0.01" value="{{ old('discount', $product->discount) }}" min="0" max="100"
                   class="bg-gray-800 border border-gray-700 rounded w-full py-2 px-4 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('discount')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Image -->
        <div class="mb-6">
            <label for="image" class="block text-sm font-semibold mb-2">Image</label>
            <input type="file" name="image" id="image"
                   class="bg-gray-800 border border-gray-700 rounded w-full py-2 px-4 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('image')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
            @if ($product->image)
                <p class="text-gray-400 mt-2">Current image: 
                    <a href="{{ Storage::url($product->image) }}" target="_blank" class="underline text-blue-400 hover:text-blue-600">View</a>
                </p>
            @endif
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
                Update Product
            </button>
            <a href="{{ route('products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<!-- Include AOS -->
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