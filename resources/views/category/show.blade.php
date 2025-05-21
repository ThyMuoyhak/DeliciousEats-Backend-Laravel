@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <a href="{{ route('categories.index') }}" class="text-gray-400 hover:text-white transition-colors">
                        Categories
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-gray-300">{{ $category->cat_name }}</span>
                </div>
                <h1 class="text-3xl font-bold text-white">{{ $category->cat_name }}</h1>
                <p class="text-gray-400 mt-2">Category Details</p>
            </div>
            <div class="mt-4 md:mt-0 flex flex-wrap gap-3">
                <a href="{{ route('categories.edit', $category->cat_id) }}" class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg shadow-cyan-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    Edit Category
                </a>
                <a href="{{ route('categories.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back to Categories
                </a>
            </div>
        </div>

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

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Category Details Card -->
            <div class="lg:col-span-2">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-6">
                    <div class="p-6 border-b border-gray-700/50">
                        <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                            Category Information
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-400 mb-1">Category ID</h3>
                                    <p class="text-lg text-white">{{ $category->cat_id }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-400 mb-1">Category Name</h3>
                                    <p class="text-lg text-white">{{ $category->cat_name }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-400 mb-1">Created At</h3>
                                    <p class="text-lg text-white">{{ $category->created_at ? $category->created_at->format('M d, Y h:i A') : 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-400 mb-1">Products Count</h3>
                                    <p class="text-lg text-white flex items-center gap-2">
                                        <span class="bg-cyan-600/20 text-cyan-400 py-1 px-3 rounded-full text-sm font-medium">
                                            {{ $category->products()->count() }}
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-400 mb-1">Status</h3>
                                    <p class="text-lg text-white">
                                        <span class="bg-emerald-600/20 text-emerald-400 py-1 px-3 rounded-full text-sm font-medium">
                                            Active
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-400 mb-1">Last Updated</h3>
                                    <p class="text-lg text-white">{{ $category->updated_at ? $category->updated_at->format('M d, Y h:i A') : 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        @if(isset($category->description) && !empty($category->description))
                        <div class="mt-6 pt-6 border-t border-gray-700/50">
                            <h3 class="text-sm font-medium text-gray-400 mb-2">Description</h3>
                            <p class="text-gray-300">{{ $category->description }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Products in Category -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
                    <div class="p-6 border-b border-gray-700/50 flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                            </svg>
                            Products in this Category
                        </h2>
                        <span class="bg-gray-700/50 text-gray-300 text-sm py-1 px-3 rounded-full">
                            {{ $category->products()->count() }} {{ Str::plural('Product', $category->products()->count()) }}
                        </span>
                    </div>
                    
                    @if($category->products()->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-900/70 text-gray-400 text-sm">
                                    <th class="py-3 px-6 text-left font-medium">ID</th>
                                    <th class="py-3 px-6 text-left font-medium">Name</th>
                                    <th class="py-3 px-6 text-center font-medium">Price</th>
                                    <th class="py-3 px-6 text-center font-medium">Stock</th>
                                    <th class="py-3 px-6 text-center font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800/50">
                                @foreach($category->products as $product)
                                <tr class="hover:bg-gray-700/30 transition-colors duration-150">
                                    <td class="py-3 px-6 text-gray-300">{{ $product->pro_id }}</td>
                                    <td class="py-3 px-6 text-gray-200 font-medium">{{ $product->pro_name }}</td>
                                    <td class="py-3 px-6 text-center text-gray-300">${{ number_format($product->price, 2) }}</td>
                                    <td class="py-3 px-6 text-center">
                                        @if($product->qty > 10)
                                            <span class="bg-emerald-600/20 text-emerald-400 py-0.5 px-2 rounded-full text-xs">
                                                {{ $product->qty }} in stock
                                            </span>
                                        @elseif($product->qty > 0)
                                            <span class="bg-amber-600/20 text-amber-400 py-0.5 px-2 rounded-full text-xs">
                                                {{ $product->qty }} left
                                            </span>
                                        @else
                                            <span class="bg-rose-600/20 text-rose-400 py-0.5 px-2 rounded-full text-xs">
                                                Out of stock
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('products.show', $product->pro_id) }}" class="p-1.5 bg-gray-700/50 hover:bg-gray-700 text-gray-300 hover:text-white rounded-lg transition-colors" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="p-8 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <p class="text-lg">No products in this category</p>
                            <p class="text-sm text-gray-600 mt-1">Add products to this category to see them here</p>
                            <a href="{{ route('products.create') }}" class="mt-4 bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Add Product
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Actions Card -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-6">
                    <div class="p-4 border-b border-gray-700/50">
                        <h3 class="text-md font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                            Actions
                        </h3>
                    </div>
                    <div class="p-4 space-y-3">
                        <a href="{{ route('categories.edit', $category->cat_id) }}" class="w-full bg-cyan-600/20 hover:bg-cyan-600/30 text-cyan-400 font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit Category
                        </a>
                        <form action="{{ route('categories.destroy', $category->cat_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? This will remove all products from this category.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-rose-600/20 hover:bg-rose-600/30 text-rose-400 font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                Delete Category
                            </button>
                        </form>
                        <a href="{{ route('products.create') }}?category_id={{ $category->cat_id }}" class="w-full bg-emerald-600/20 hover:bg-emerald-600/30 text-emerald-400 font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Product to Category
                        </a>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
                    <div class="p-4 border-b border-gray-700/50">
                        <h3 class="text-md font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                            </svg>
                            Category Stats
                        </h3>
                    </div>
                    <div class="p-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                                <p class="text-gray-400 text-xs mb-1">Products</p>
                                <p class="text-2xl font-bold text-white">{{ $category->products()->count() }}</p>
                            </div>
                            <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                                <p class="text-gray-400 text-xs mb-1">Total Stock</p>
                                <p class="text-2xl font-bold text-white">{{ $category->products()->sum('qty') }}</p>
                            </div>
                            <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                                <p class="text-gray-400 text-xs mb-1">Avg. Price</p>
                                <p class="text-2xl font-bold text-white">
                                    ${{ $category->products()->count() > 0 ? number_format($category->products()->avg('price'), 2) : '0.00' }}
                                </p>
                            </div>
                            <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                                <p class="text-gray-400 text-xs mb-1">Out of Stock</p>
                                <p class="text-2xl font-bold text-white">{{ $category->products()->where('qty', 0)->count() }}</p>
                            </div>
                        </div>
                    </div>
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

/* Table styles */
table {
    border-collapse: separate;
    border-spacing: 0;
}

/* Smooth transitions */
.transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
}
</style>
@endsection