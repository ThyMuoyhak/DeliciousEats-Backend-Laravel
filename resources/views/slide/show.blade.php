@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Slide Hero #{{ $slide->id }}</h1>
                <p class="text-gray-400">Details of the hero slide</p>
            </div>
            <div class="flex gap-3 mt-4 md:mt-0">
                <a href="{{ route('slide-heroes.edit', $slide->id) }}" class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg shadow-cyan-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Slide
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

        <!-- Slide Details -->
        <div class="bg-gray-800/50 rounded-xl border border-gray-700/50 p-6 shadow-xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Text Details -->
                <div>
                    <h2 class="text-xl font-semibold text-white mb-4">Slide Information</h2>
                    <div class="space-y-4">
                        <div>
                            <span class="text-gray-400 font-medium">Main Title:</span>
                            <p class="text-gray-200">{{ $slide->main_title }}</p>
                        </div>
                        <div>
                            <span class="text-gray-400 font-medium">Description:</span>
                            <p class="text-gray-200">{{ $slide->description }}</p>
                        </div>
                    </div>
                </div>
                <!-- Images -->
                <div>
                    <h2 class="text-xl font-semibold text-white mb-4">Images</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ([$slide->image1, $slide->image2, $slide->image3] as $index => $image)
                            <div>
                                <p class="text-gray-400 font-medium mb-2">Image {{ $index + 1 }}:</p>
                                @if ($image)
                                    <img 
                                        src="{{ filter_var($image, FILTER_VALIDATE_URL) ? $image : Storage::url($image) }}" 
                                        alt="Slide Image {{ $index + 1 }}" 
                                        class="h-32 w-full object-cover rounded-lg border border-gray-700/50 shadow-md" 
                                        loading="lazy" 
                                        onerror="this.src='/images/fallback.jpg'"
                                    >
                                @else
                                    <div class="h-32 w-full rounded-lg bg-gray-700/50 flex items-center justify-center text-gray-500 border border-gray-700/50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        @endforeach
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
    
    /* Glow effects */
    .bg-cyan-600\/20 {
        box-shadow: 0 0 10px rgba(8, 145, 178, 0.1);
    }
    
    .bg-rose-600\/20 {
        box-shadow: 0 0 10px rgba(225, 29, 72, 0.1);
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
</style>
@endsection