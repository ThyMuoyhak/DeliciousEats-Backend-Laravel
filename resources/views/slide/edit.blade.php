@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Edit Slide Hero #{{ $slide->id }}</h1>
                <p class="text-gray-400">Update the hero slide details</p>
            </div>
            <div class="flex gap-3 mt-4 md:mt-0">
                <a href="{{ route('slide-heroes.show', $slide->id) }}" class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    View Slide
                </a>
                <a href="{{ route('slide-heroes.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Slides
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

        <!-- Edit Form -->
        <div class="bg-gray-800/50 rounded-xl border border-gray-700/50 p-6 shadow-xl">
            <form id="update-slide-form" action="{{ route('slide-heroes.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Text Fields -->
                    <div class="space-y-6">
                        <div>
                            <label for="main_title" class="block text-sm font-medium text-gray-400">Main Title</label>
                            <input 
                                type="text" 
                                name="main_title" 
                                id="main_title" 
                                value="{{ old('main_title', $slide->main_title) }}" 
                                class="mt-1 bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg w-full py-2.5 px-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200" 
                                placeholder="Enter main title" 
                                required
                            >
                            @error('main_title')
                                <p class="text-rose-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-400">Description</label>
                            <textarea 
                                name="description" 
                                id="description" 
                                class="mt-1 bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg w-full py-2.5 px-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200" 
                                rows="5" 
                                placeholder="Enter description" 
                                required
                            >{{ old('description', $slide->description) }}</textarea>
                            @error('description')
                                <p class="text-rose-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Image Fields -->
                    <div class="space-y-6">
                        @foreach (['image1', 'image2', 'image3'] as $index => $imageField)
                            <div>
                                <label for="{{ $imageField }}" class="block text-sm font-medium text-gray-400">Image {{ $index + 1 }}</label>
                                <div class="flex items-center gap-4 mb-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="{{ $imageField }}_type" value="file" {{ filter_var($slide->$imageField, FILTER_VALIDATE_URL) ? '' : 'checked' }} class="mr-2 text-cyan-600 focus:ring-cyan-500">
                                        File
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="{{ $imageField }}_type" value="url" {{ filter_var($slide->$imageField, FILTER_VALIDATE_URL) ? 'checked' : '' }} class="mr-2 text-cyan-600 focus:ring-cyan-500">
                                        URL
                                    </label>
                                </div>
                                <input 
                                    type="file" 
                                    name="{{ $imageField }}" 
                                    id="{{ $imageField }}_file" 
                                    accept="image/*" 
                                    class="mt-1 bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg w-full py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200 {{ filter_var($slide->$imageField, FILTER_VALIDATE_URL) ? 'hidden' : '' }}"
                                >
                                <input 
                                    type="url" 
                                    name="{{ $imageField }}_url" 
                                    id="{{ $imageField }}_url" 
                                    value="{{ old($imageField . '_url', filter_var($slide->$imageField, FILTER_VALIDATE_URL) ? $slide->$imageField : '') }}" 
                                    placeholder="Enter image URL"
                                    class="mt-1 bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg w-full py-2.5 px-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200 {{ filter_var($slide->$imageField, FILTER_VALIDATE_URL) ? '' : 'hidden' }}"
                                >
                                @error($imageField)
                                    <p class="text-rose-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                @if ($slide->$imageField)
                                    <img 
                                        src="{{ filter_var($slide->$imageField, FILTER_VALIDATE_URL) ? $slide->$imageField : Storage::url($slide->$imageField) }}" 
                                        alt="Image {{ $index + 1 }} Preview" 
                                        class="mt-2 h-24 w-full object-cover rounded-lg border border-gray-700/50 shadow-md" 
                                        loading="lazy" 
                                        onerror="this.src='/images/fallback.jpg'"
                                    >
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-8 flex gap-4 flex-wrap">
                    <button 
                        type="submit" 
                        form="update-slide-form"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-6 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg shadow-cyan-900/20"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Update Slide
                    </button>
                    <button 
                        type="button" 
                        onclick="document.getElementById('delete-modal').classList.remove('hidden')"
                        class="bg-rose-600 hover:bg-rose-700 text-white font-medium py-2.5 px-6 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg shadow-rose-900/20"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete Slide
                    </button>
                </div>
            </form>

            <!-- Delete Confirmation Modal -->
            <div id="delete-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-gray-800 p-6 rounded-lg max-w-md w-full">
                    <h3 class="text-lg font-medium text-white mb-4">Confirm Deletion</h3>
                    <p class="text-gray-400 mb-6">Are you sure you want to delete this slide? This action cannot be undone.</p>
                    <form id="delete-slide-form" action="{{ route('slide-heroes.destroy', $slide->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex gap-3">
                            <button 
                                type="submit" 
                                class="bg-rose-600 hover:bg-rose-700 text-white font-medium py-2 px-4 rounded-lg transition-all duration-200"
                            >
                                Delete
                            </button>
                            <button 
                                type="button" 
                                onclick="document.getElementById('delete-modal').classList.add('hidden')"
                                class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition-all duration-200"
                            >
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const field = this.name.replace('_type', '');
            const fileInput = document.getElementById(`${field}_file`);
            const urlInput = document.getElementById(`${field}_url`);
            if (this.value === 'file') {
                fileInput.classList.remove('hidden');
                urlInput.classList.add('hidden');
                urlInput.value = '';
            } else {
                urlInput.classList.remove('hidden');
                fileInput.classList.add('hidden');
                fileInput.value = '';
            }
        });
    });
</script>

<style>
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
    
    .bg-cyan-600\/20 {
        box-shadow: 0 0 10px rgba(8, 145, 178, 0.2);
    }
    
    .bg-rose-600\/20 {
        box-shadow: 0 0 10px rgba(225, 29, 72, 0.2);
    }
    
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }
</style>
@endsection