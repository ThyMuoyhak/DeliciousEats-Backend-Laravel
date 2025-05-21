@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Add New Category</h1>
                <p class="text-gray-400">Create a new category for your products</p>
            </div>
            <a href="{{ route('categories.index') }}" class="mt-4 md:mt-0 bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back to Categories
            </a>
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
        <div class="max-w-2xl mx-auto">
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-700/50">
                    <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Category Information
                    </h2>
                </div>

                <form action="{{ route('categories.store') }}" method="POST" class="p-6">
                    @csrf
                    
                    <div class="space-y-6">
                        <!-- Category Name -->
                        <div>
                            <label for="cat_name" class="block text-sm font-medium text-gray-300 mb-1">Category Name <span class="text-rose-400">*</span></label>
                            <input 
                                type="text" 
                                id="cat_name" 
                                name="cat_name" 
                                value="{{ old('cat_name') }}" 
                                required
                                class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                placeholder="Enter category name"
                            >
                            @error('cat_name')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category Description (Optional) -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-1">Description <span class="text-gray-500">(Optional)</span></label>
                            <textarea 
                                id="description" 
                                name="description"
                                rows="3"
                                class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                placeholder="Enter category description"
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center">
                                    <input 
                                        type="radio" 
                                        id="status_active" 
                                        name="status" 
                                        value="active" 
                                        checked 
                                        class="h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-gray-700 bg-gray-900"
                                    >
                                    <label for="status_active" class="ml-2 block text-sm text-gray-300">
                                        Active
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input 
                                        type="radio" 
                                        id="status_inactive" 
                                        name="status" 
                                        value="inactive" 
                                        class="h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-gray-700 bg-gray-900"
                                    >
                                    <label for="status_inactive" class="ml-2 block text-sm text-gray-300">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                            @error('status')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Display Order -->
                        <div>
                            <label for="display_order" class="block text-sm font-medium text-gray-300 mb-1">Display Order <span class="text-gray-500">(Optional)</span></label>
                            <input 
                                type="number" 
                                id="display_order" 
                                name="display_order" 
                                value="{{ old('display_order', 0) }}" 
                                min="0"
                                class="w-full px-4 py-2.5 bg-gray-900/70 border border-gray-700/50 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200"
                                placeholder="Enter display order"
                            >
                            <p class="mt-1 text-xs text-gray-500">Categories with lower numbers will appear first</p>
                            @error('display_order')
                                <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-8 pt-6 border-t border-gray-700/50 flex flex-wrap gap-3">
                        <button 
                            type="submit"
                            class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-200 shadow-lg shadow-cyan-900/20 flex items-center gap-2"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Create Category
                        </button>
                        <a 
                            href="{{ route('categories.index') }}"
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

            <!-- Tips Card -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
                <div class="p-4 border-b border-gray-700/50">
                    <h3 class="text-md font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        Tips for Creating Categories
                    </h3>
                </div>
                <div class="p-4 text-sm text-gray-300">
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Use clear, descriptive names for your categories</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Keep your category structure simple and intuitive</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Consider using a consistent naming convention</span>
                        </li>
                    </ul>
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

/* Smooth transitions */
.transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
}

/* Custom radio button styling */
input[type="radio"] {
    appearance: none;
    -webkit-appearance: none;
    width: 1rem;
    height: 1rem;
    border: 2px solid #4B5563;
    border-radius: 50%;
    background-clip: content-box;
    padding: 2px;
}

input[type="radio"]:checked {
    background-color: #0891B2;
    border-color: #0891B2;
}

input[type="radio"]:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(8, 145, 178, 0.5);
}
</style>
@endsection