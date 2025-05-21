@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb Navigation -->
        <nav class="flex mb-6 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{ route('products.index') }}" class="ml-1 text-gray-400 hover:text-white transition-colors md:ml-2">Products</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-1 text-gray-300 md:ml-2 font-medium truncate">{{ $product->pro_name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Notifications -->
        @if (session('success'))
            <div class="bg-emerald-900/50 border-l-4 border-emerald-500 text-emerald-200 p-4 mb-6 rounded-r-lg flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-rose-900/50 border-l-4 border-rose-500 text-rose-200 p-4 mb-6 rounded-r-lg flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-rose-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Product Details Card -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-8">
            <div class="p-6 border-b border-gray-700/50 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-white">{{ $product->pro_name }}</h1>
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-gray-700/50 text-gray-300 rounded-full text-sm font-medium">
                        {{ $product->category ? $product->category->cat_name : 'No Category' }}
                    </span>
                    @if($product->qty > 10)
                        <span class="px-3 py-1 bg-emerald-900/30 text-emerald-400 rounded-full text-sm font-medium">
                            In Stock
                        </span>
                    @elseif($product->qty > 0)
                        <span class="px-3 py-1 bg-amber-900/30 text-amber-400 rounded-full text-sm font-medium">
                            Low Stock
                        </span>
                    @else
                        <span class="px-3 py-1 bg-rose-900/30 text-rose-400 rounded-full text-sm font-medium">
                            Out of Stock
                        </span>
                    @endif
                    @if($product->discount)
                        <span class="px-3 py-1 bg-cyan-900/30 text-cyan-400 rounded-full text-sm font-medium">
                            {{ $product->discount }}% Off
                        </span>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
                <!-- Product Image -->
                <div class="flex items-center justify-center">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-lg blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
                        <div class="relative bg-gray-900 p-2 rounded-lg overflow-hidden">
                            @if ($product->image)
                                <img 
                                    src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : Storage::url($product->image) }}" 
                                    alt="{{ $product->pro_name }}" 
                                    class="rounded-lg object-contain w-full max-h-[400px]" 
                                    loading="lazy" 
                                    onerror="this.src='/images/fallback.jpg'"
                                >
                            @else
                                <div class="h-[400px] w-full rounded-lg bg-gray-800 flex items-center justify-center text-gray-500">
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p>No image available</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="flex flex-col">
                    <div class="mb-6">
                        <div class="text-sm text-gray-400 mb-1">Product Code</div>
                        <div class="text-lg font-medium text-gray-200">{{ $product->pro_code }}</div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <div class="text-sm text-gray-400 mb-1">Price</div>
                            <div class="text-xl font-bold text-gray-200">${{ number_format($product->price, 2) }}</div>
                        </div>

                        <div>
                            <div class="text-sm text-gray-400 mb-1">Discounted Price</div>
                            @if($product->discounted_price < $product->price)
                                <div class="flex items-end gap-2">
                                    <div class="text-xl font-bold text-emerald-400">${{ number_format($product->discounted_price, 2) }}</div>
                                    <div class="text-sm text-gray-500 line-through">${{ number_format($product->price, 2) }}</div>
                                </div>
                            @else
                                <div class="text-xl font-bold text-gray-200">${{ number_format($product->discounted_price, 2) }}</div>
                            @endif
                        </div>

                        <div>
                            <div class="text-sm text-gray-400 mb-1">Quantity</div>
                            <div class="text-lg font-medium text-gray-200">{{ $product->qty }} units</div>
                        </div>

                        <div>
                            <div class="text-sm text-gray-400 mb-1">Category</div>
                            <div class="text-lg font-medium text-gray-200">{{ $product->category ? $product->category->cat_name : 'No Category' }}</div>
                        </div>
                    </div>

                    @if($product->description)
                        <div class="mb-6">
                            <div class="text-sm text-gray-400 mb-2">Description</div>
                            <div class="bg-gray-800/50 rounded-lg p-4 text-gray-300 border border-gray-700/50">
                                {{ $product->description }}
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="mt-auto pt-6 border-t border-gray-700/50 flex flex-wrap gap-3">
                        <a href="{{ route('products.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg transition-all duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Back to Products
                        </a>
                        <a href="{{ route('products.edit', $product->pro_id) }}" class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-5 rounded-lg transition-all duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit Product
                        </a>
                        <form action="{{ route('products.destroy', $product->pro_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white font-medium py-2.5 px-5 rounded-lg transition-all duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                Delete Product
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products (Optional) -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
            <div class="p-6 border-b border-gray-700/50">
                <h2 class="text-xl font-bold text-white">Related Products</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- This is a placeholder. You would need to pass related products from your controller -->
                    <div class="bg-gray-800/50 rounded-lg border border-gray-700/50 overflow-hidden hover:shadow-lg transition-all duration-200 hover:border-gray-600/50">
                        <div class="h-40 bg-gray-700 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 class="text-gray-200 font-medium mb-1">Related Product 1</h3>
                            <p class="text-gray-400 text-sm mb-2">Category</p>
                            <p class="text-cyan-400 font-bold">$99.99</p>
                        </div>
                    </div>
                    
                    <!-- Add more related product cards as needed -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom scrollbar for webkit browsers */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: rgba(31, 41, 55, 0.5);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: rgba(75, 85, 99, 0.5);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: rgba(107, 114, 128, 0.5);
    }
    
    /* Glow effects */
    .bg-gradient-to-r {
        animation: glow 2s ease-in-out infinite alternate;
    }
    
    @keyframes glow {
        from {
            opacity: 0.25;
        }
        to {
            opacity: 0.35;
        }
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
</style>
@endsection