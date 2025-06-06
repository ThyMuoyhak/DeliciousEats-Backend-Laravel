@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Create Slide Hero</h1>
                <p class="text-gray-400">Add a new hero slide</p>
            </div>
            <div class="flex gap-3 mt-4 md:mt-0">
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

        <!-- Create Form -->
        <div class="bg-gray-800/50 rounded-xl border border-gray-700/50 p-6 shadow-xl">
            <form action="{{ route('slide-heroes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Text Fields -->
                    <div class="space-y-6">
                        <div>
                            <label for="main_title" class="block text-sm font-medium text-gray-400">Main Title</label>
                            <input 
                                type="text" 
                                name="main_title" 
                                id="main_title" 
                                value="{{ old('main_title') }}" 
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
                            >{{ old('description') }}</textarea>
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
                                        <input type="radio" name="{{ $imageField }}_type" value="file" checked class="mr-2 text-cyan-600 focus:ring-cyan-500">
                                        File
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="{{ $imageField }}_type" value="url" class="mr-2 text-cyan-600 focus:ring-cyan-500">
                                        URL
                                    </label>
                                </div>
                                <input 
                                    type="file" 
                                    name="{{ $imageField }}" 
                                    id="{{ $imageField }}_file" 
                                    accept="image/*" 
                                    class="mt-1 bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg w-full py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200 {{ old($imageField . '_type', 'file') == 'file' ? '' : 'hidden' }}"
                                >
                                <input 
                                    type="url" 
                                    name="{{ $imageField }}_url" 
                                    id="{{ $imageField }}_url" 
                                    value="{{ old($imageField . '_url') }}" 
                                    placeholder="Enter image URL"
                                    class="mt-1 bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg w-full py-2.5 px-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200 {{ old($imageField . '_type', 'file') == 'url' ? '' : 'hidden' }}"
                                >
                                @error($imageField)
                                    <p class="text-rose-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-6 flex gap-3">
                    <button 
                        type="submit" 
                        class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg shadow-cyan-900/20"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Create Slide
                    </button>
                    <a 
                        href="{{ route('slide-heroes.index') }}" 
                        class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </a>
                </div>
            </form>
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
        box-shadow: 0 0 10px rgba(8, 145, 178, 0.1);
    }
    
    .bg-rose-600\/20 {
        box-shadow: 0 0 10px rgba(225, 29, 72, 0.1);
    }
    
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
</style>
@endsection