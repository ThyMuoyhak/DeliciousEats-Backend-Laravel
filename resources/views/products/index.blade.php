<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gray-900 text-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold mb-6" data-aos="fade-down">Products</h1>

    <!-- Search Form -->
    <div class="mb-6" data-aos="fade-up" data-aos-delay="100">
        <form action="{{ route('products.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search by name or code"
                class="bg-gray-800 text-gray-100 border border-gray-700 rounded-xl w-full py-2 px-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button 
                type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200"
            >
                Search
            </button>
            @if (request('search'))
                <a href="{{ route('products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-800 border border-green-600 text-green-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="150">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if (session('error'))
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="150">
            {{ session('error') }}
        </div>
    @endif

    <!-- Products Table -->
    <div class="overflow-x-auto" data-aos="fade-up" data-aos-delay="200">
        <table class="w-full border-collapse rounded-xl overflow-hidden border border-gray-700 bg-gray-800">
            <thead>
                <tr class="bg-gray-700 text-gray-300">
                    <th class="border border-gray-700 p-3 text-left">Image</th>
                    <th class="border border-gray-700 p-3 text-left">Code</th>
                    <th class="border border-gray-700 p-3 text-left">Name</th>
                    <th class="border border-gray-700 p-3 text-left">Category</th>
                    <th class="border border-gray-700 p-3 text-left">Quantity</th>
                    <th class="border border-gray-700 p-3 text-left">Price</th>
                    <th class="border border-gray-700 p-3 text-left">Discounted Price</th>
                    <th class="border border-gray-700 p-3 text-left">Discount</th>
                    <th class="border border-gray-700 p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="hover:bg-gray-700 transition duration-150">
                        <td class="border border-gray-700 p-3">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->pro_name }}" class="h-16 w-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="border border-gray-700 p-3">{{ $product->pro_code }}</td>
                        <td class="border border-gray-700 p-3">{{ $product->pro_name }}</td>
                        <td class="border border-gray-700 p-3">
                            {{ $product->category ? $product->category->cat_name : 'No Category' }}
                        </td>
                        <td class="border border-gray-700 p-3">{{ $product->qty }}</td>
                        <td class="border border-gray-700 p-3">{{ number_format($product->price, 2) }}</td>
                        <td class="border border-gray-700 p-3">{{ number_format($product->discounted_price, 2) }}</td>
                        <td class="border border-gray-700 p-3">
                            {{ $product->discount ? $product->discount . '%' : 'None' }}
                        </td>
                        <td class="border border-gray-700 p-3">
                            <div class="flex gap-2">
                                <a href="{{ route('products.show', $product->pro_id) }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                    View
                                </a>
                                <a href="{{ route('products.edit', $product->pro_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->pro_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
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
                        <td colspan="9" class="border border-gray-700 p-4 text-center text-gray-400">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6" data-aos="fade-up" data-aos-delay="300">
        {{ $products->links('vendor.pagination.tailwind') }}
    </div>

    <!-- Add Product Button -->
    <div class="mt-6" data-aos="fade-up" data-aos-delay="400">
        <a href="{{ route('products.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-xl inline-block transition duration-200">
            Add Product
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