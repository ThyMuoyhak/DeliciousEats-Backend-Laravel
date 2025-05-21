@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Edit Product</h1>
                <p class="text-gray-400">Update product information for {{ $product->pro_name }}</p>
            </div>
            <div class="flex gap-3 mt-4 md:mt-0">
                <a href="{{ route('products.show', $product->pro_id) }}" class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                    </svg>
                    View Product
                </a>
                <a href="{{ route('products.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back to Products
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

        @if ($errors->any())
            <div class="bg-rose-900/50 border-l-4 border-rose-500 text-rose-200 p-4 mb-6 rounded-r-lg">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-rose-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">Please correct the following errors:</span>
                </div>
                <ul class="mt-2 ml-9 list-disc text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (session('error'))
            <div class="bg-rose-900/50 border-l-4 border-rose-500 text-rose-200 p-4 mb-6 rounded-r-lg flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-rose-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-8">
            <div class="p-6 border-b border-gray-700/50">
                <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    Edit Product Information
                </h2>
            </div>

            <form action="{{ route('products.update', $product->pro_id) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Product Code -->
                        <div>
                            <label for="pro_code" class="block text-sm font-medium text-gray-300 mb-1">Product Code <span class="text-rose-400">*</span></label>
                            <input 
                                type="text" 
                                id="pro_code" 
                                name="pro_code" 
                                value="{{ old('pro_code', $product->pro_code) }}" 
                                required
                                class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                placeholder="Enter product code"
                            >
                            @error('pro_code')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Name -->
                        <div>
                            <label for="pro_name" class="block text-sm font-medium text-gray-300 mb-1">Product Name <span class="text-rose-400">*</span></label>
                            <input 
                                type="text" 
                                id="pro_name" 
                                name="pro_name" 
                                value="{{ old('pro_name', $product->pro_name) }}" 
                                required
                                class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                placeholder="Enter product name"
                            >
                            @error('pro_name')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-300 mb-1">Category</label>
                            <select 
                                name="category_id" 
                                id="category_id"
                                class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                            >
                                <option value="" {{ old('category_id', $product->category_id) === null ? 'selected' : '' }}>Select a Category (Optional)</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->cat_id }}" {{ old('category_id', $product->category_id) == $category->cat_id ? 'selected' : '' }}>
                                        {{ $category->cat_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price and Discount Row -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-300 mb-1">Price <span class="text-rose-400">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-400">$</span>
                                    </div>
                                    <input 
                                        type="number" 
                                        id="price" 
                                        name="price" 
                                        value="{{ old('price', $product->price) }}" 
                                        required 
                                        min="0" 
                                        step="0.01"
                                        class="w-full pl-8 pr-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                        placeholder="0.00"
                                    >
                                </div>
                                @error('price')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Discount -->
                            <div>
                                <label for="discount" class="block text-sm font-medium text-gray-300 mb-1">Discount</label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="discount" 
                                        name="discount" 
                                        value="{{ old('discount', $product->discount) }}" 
                                        min="0" 
                                        max="100"
                                        class="w-full pr-8 pl-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                        placeholder="0"
                                    >
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-400">%</span>
                                    </div>
                                </div>
                                @error('discount')
                                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div>
                            <label for="qty" class="block text-sm font-medium text-gray-300 mb-1">Quantity <span class="text-rose-400">*</span></label>
                            <input 
                                type="number" 
                                id="qty" 
                                name="qty" 
                                value="{{ old('qty', $product->qty) }}" 
                                required 
                                min="0"
                                class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                placeholder="Enter quantity"
                            >
                            @error('qty')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-1">Description</label>
                            <textarea 
                                id="description" 
                                name="description"
                                rows="4"
                                class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                placeholder="Enter product description"
                            >{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Image Preview -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Current Image</label>
                            <div class="bg-gray-900/70 border border-gray-700/50 rounded-lg p-4 flex items-center justify-center">
                                @if ($product->image)
                                    <div class="relative group">
                                        <div class="absolute -inset-1 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-lg blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
                                        <div class="relative">
                                            <img 
                                                src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : Storage::url($product->image) }}"
                                                alt="{{ $product->pro_name }}" 
                                                class="h-40 object-contain rounded-lg" 
                                                loading="lazy" 
                                                onerror="this.src='/images/fallback.jpg'"
                                                id="current-image"
                                            >
                                        </div>
                                    </div>
                                @else
                                    <div class="h-40 w-full flex items-center justify-center text-gray-500">
                                        <div class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p>No image available</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-300 mb-1">New Image (Upload)</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-700 border-dashed rounded-lg">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-400">
                                        <label for="image" class="relative cursor-pointer bg-gray-800 rounded-md font-medium text-cyan-400 hover:text-cyan-300 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-cyan-500">
                                            <span class="px-2">Upload a file</span>
                                            <input id="image" name="image" type="file" class="sr-only" onchange="previewImage(this)">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                            @error('image')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image URL -->
                        <div>
                            <label for="image_url" class="block text-sm font-medium text-gray-300 mb-1">New Image (URL)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input 
                                    type="url" 
                                    id="image_url" 
                                    name="image_url" 
                                    value="{{ old('image_url', filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : '') }}"
                                    placeholder="https://example.com/image.jpg"
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                    onchange="previewImageUrl(this.value)"
                                >
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Enter an external image URL or upload an image above. URL takes precedence if both are provided.</p>
                            @error('image_url')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 pt-6 border-t border-gray-700/50 flex flex-wrap gap-3">
                    <button 
                        type="submit"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-200 shadow-lg shadow-cyan-900/20 flex items-center gap-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Update Product
                    </button>
                    <a 
                        href="{{ route('products.index') }}"
                        class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-200 flex items-center gap-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Cancel
                    </a>
                </div>
            </form>
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
    
    /* File input styling */
    input[type="file"]::file-selector-button {
        border: none;
        background: #374151;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        color: white;
        cursor: pointer;
        transition: background 0.2s ease-in-out;
    }
    
    input[type="file"]::file-selector-button:hover {
        background: #4B5563;
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

<script>
    // Preview uploaded image
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const currentImage = document.getElementById('current-image');
                if (currentImage) {
                    currentImage.src = e.target.result;
                }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    // Preview image from URL
    function previewImageUrl(url) {
        if (url) {
            const currentImage = document.getElementById('current-image');
            if (currentImage) {
                currentImage.src = url;
                // Set a fallback in case the URL is invalid
                currentImage.onerror = function() {
                    this.src = '/images/fallback.jpg';
                }
            }
        }
    }
</script>
@endsection