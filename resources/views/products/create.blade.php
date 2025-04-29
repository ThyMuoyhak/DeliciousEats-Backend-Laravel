@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 bg-gray-900 text-gray-100 min-h-screen">
    <h1 class="text-3xl font-semibold mb-6" data-aos="fade-down">Add New Product</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-800 border border-green-600 text-green-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="50">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if ($errors->any())
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="50">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif (session('error'))
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="50">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" data-aos="fade-up" data-aos-delay="100">
        @csrf

        <!-- Product Code -->
        <div>
            <label for="pro_code" class="block text-sm font-medium text-gray-300">Product Code</label>
            <input type="text" id="pro_code" name="pro_code" value="{{ old('pro_code') }}" required
                   class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('pro_code')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Product Name -->
        <div>
            <label for="pro_name" class="block text-sm font-medium text-gray-300">Product Name</label>
            <input type="text" id="pro_name" name="pro_name" value="{{ old('pro_name') }}" required
                   class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('pro_name')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Quantity -->
        <div>
            <label for="qty" class="block text-sm font-medium text-gray-300">Quantity</label>
            <input type="number" id="qty" name="qty" value="{{ old('qty') }}" required min="0"
                   class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('qty')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-300">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" required min="0" step="0.01"
                   class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('price')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
            <textarea id="description" name="description"
                      class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Discount -->
        <div>
            <label for="discount" class="block text-sm font-medium text-gray-300">Discount (%)</label>
            <input type="number" id="discount" name="discount" value="{{ old('discount') }}" min="0" max="100"
                   class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('discount')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Image Upload -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-300">Product Image (Upload)</label>
            <input type="file" id="image" name="image"
                   class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('image')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Image URL -->
        <div>
            <label for="image_url" class="block text-sm font-medium text-gray-300">Product Image (URL)</label>
            <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                   placeholder="https://example.com/image.jpg"
                   class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-gray-400 text-sm mt-1">Enter an external image URL or upload an image above. URL takes precedence if both are provided.</p>
            @error('image_url')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-300">Category</label>
            <select name="category_id" id="category_id"
                    class="w-full p-3 bg-gray-800 border border-gray-700 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" {{ old('category_id') === null ? 'selected' : '' }}>Select a Category (Optional)</option>
                @foreach($categories as $category)
                    <option value="{{ $category->cat_id }}" {{ old('category_id') == $category->cat_id ? 'selected' : '' }}>
                        {{ $category->cat_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="flex space-x-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add Product
            </button>
            <a href="{{ route('products.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Cancel
            </a>
        </div>
    </form>
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