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
                    <a href="{{ route('categories.show', $category->cat_id) }}" class="text-gray-400 hover:text-white transition-colors">
                        {{ $category->cat_name }}
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-gray-300">Edit</span>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Edit Category</h1>
                <p class="text-gray-400">Update information for {{ $category->cat_name }}</p>
            </div>
            <div class="mt-4 md:mt-0 flex flex-wrap gap-3">
                <a href="{{ route('categories.show', $category->cat_id) }}" class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back to Category
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

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Form Card -->
            <div class="lg:col-span-2">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-6">
                    <div class="p-6 border-b border-gray-700/50">
                        <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit Category Information
                        </h2>
                    </div>

                    <form action="{{ route('categories.update', $category->cat_id) }}" method="POST" class="p-6" id="editCategoryForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-6">
                            <!-- Category Name -->
                            <div>
                                <label for="cat_name" class="block text-sm font-medium text-gray-300 mb-1">Category Name <span class="text-rose-400">*</span></label>
                                <input 
                                    type="text" 
                                    id="cat_name" 
                                    name="cat_name" 
                                    value="{{ old('cat_name', $category->cat_name) }}" 
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
                                >{{ old('description', $category->description ?? '') }}</textarea>
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
                                            {{ (old('status', $category->status ?? 'active') == 'active') ? 'checked' : '' }}
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
                                            {{ (old('status', $category->status ?? 'active') == 'inactive') ? 'checked' : '' }}
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
                                    value="{{ old('display_order', $category->display_order ?? 0) }}" 
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
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Update Category
                            </button>
                            <a 
                                href="{{ route('categories.show', $category->cat_id) }}"
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

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Category Preview Card -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-6">
                    <div class="p-4 border-b border-gray-700/50">
                        <h3 class="text-md font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            Category Preview
                        </h3>
                    </div>
                    <div class="p-4">
                        <div class="bg-gray-700/30 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-medium text-white" id="preview-name">{{ $category->cat_name }}</h4>
                                <span class="bg-emerald-600/20 text-emerald-400 py-0.5 px-2 rounded-full text-xs" id="preview-status">
                                    {{ $category->status ?? 'Active' }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-400 mb-3" id="preview-description">
                                {{ $category->description ?? 'No description provided.' }}
                            </p>
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <span>ID: {{ $category->cat_id }}</span>
                                <span>Products: {{ $category->products()->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-6">
                    <div class="p-4 border-b border-gray-700/50">
                        <h3 class="text-md font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                            Quick Actions
                        </h3>
                    </div>
                    <div class="p-4 space-y-3">
                        <a href="{{ route('categories.show', $category->cat_id) }}" class="w-full bg-gray-700/50 hover:bg-gray-700/70 text-gray-300 font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            View Category
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

                <!-- Tips Card -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
                    <div class="p-4 border-b border-gray-700/50">
                        <h3 class="text-md font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            Tips
                        </h3>
                    </div>
                    <div class="p-4 text-sm text-gray-300">
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>Setting a category to inactive will hide it from customers but preserve all data</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>Use display order to control the sequence categories appear in menus</span>
                            </li>
                        </ul>
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

<script>
// Live preview of category changes
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('cat_name');
    const descriptionInput = document.getElementById('description');
    const statusActiveInput = document.getElementById('status_active');
    const statusInactiveInput = document.getElementById('status_inactive');
    
    const previewName = document.getElementById('preview-name');
    const previewDescription = document.getElementById('preview-description');
    const previewStatus = document.getElementById('preview-status');
    
    // Update name in preview
    if (nameInput && previewName) {
        nameInput.addEventListener('input', function() {
            previewName.textContent = this.value || 'Category Name';
        });
    }
    
    // Update description in preview
    if (descriptionInput && previewDescription) {
        descriptionInput.addEventListener('input', function() {
            previewDescription.textContent = this.value || 'No description provided.';
        });
    }
    
    // Update status in preview
    if (statusActiveInput && statusInactiveInput && previewStatus) {
        statusActiveInput.addEventListener('change', function() {
            if (this.checked) {
                previewStatus.textContent = 'Active';
                previewStatus.className = 'bg-emerald-600/20 text-emerald-400 py-0.5 px-2 rounded-full text-xs';
            }
        });
        
        statusInactiveInput.addEventListener('change', function() {
            if (this.checked) {
                previewStatus.textContent = 'Inactive';
                previewStatus.className = 'bg-gray-600/20 text-gray-400 py-0.5 px-2 rounded-full text-xs';
            }
        });
    }
    
    // Debug form submission
    const form = document.getElementById('editCategoryForm');
    if (form) {
        form.addEventListener('submit', function(event) {
            console.log('Form submitted');
            console.log('cat_name:', nameInput ? nameInput.value : 'N/A');
            console.log('description:', descriptionInput ? descriptionInput.value : 'N/A');
            console.log('status:', statusActiveInput && statusActiveInput.checked ? 'active' : 'inactive');
        });
    }
});
</script>
@endsection