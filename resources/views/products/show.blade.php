<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gray-900 text-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold mb-6" data-aos="fade-down">Product Details</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-800 border border-green-600 text-green-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="100">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if (session('error'))
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="100">
            {{ session('error') }}
        </div>
    @endif

    <!-- Product Details -->
    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700" data-aos="fade-up" data-aos-delay="200">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Image -->
            <div>
                @if ($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->pro_name }}" class="w-full max-w-xs object-cover rounded-lg">
                @else
                    <span class="text-gray-400">No Image</span>
                @endif
            </div>
            <!-- Details -->
            <div>
                <h2 class="text-2xl font-semibold mb-4">{{ $product->pro_name }}</h2>
                <p class="mb-2"><strong>Code:</strong> {{ $product->pro_code }}</p>
                <p class="mb-2"><strong>Category:</strong> {{ $product->category ? $product->category->cat_name : 'No Category' }}</p>
                <p class="mb-2"><strong>Quantity:</strong> {{ $product->qty }}</p>
                <p class="mb-2"><strong>Price:</strong> {{ number_format($product->price, 2) }}</p>
                <p class="mb-2"><strong>Discounted Price:</strong> {{ number_format($product->discounted_price, 2) }}</p>
                <p class="mb-2"><strong>Discount:</strong> {{ $product->discount ? $product->discount . '%' : 'None' }}</p>
                <p class="mb-2"><strong>Description:</strong> {{ $product->description ?? 'No description' }}</p>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-6 flex gap-4" data-aos="fade-up" data-aos-delay="300">
        <a href="{{ route('products.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
            Back to Products
        </a>
        <a href="{{ route('products.edit', $product->pro_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
            Edit
        </a>
        <form action="{{ route('products.destroy', $product->pro_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
                Delete
            </button>
        </form>
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