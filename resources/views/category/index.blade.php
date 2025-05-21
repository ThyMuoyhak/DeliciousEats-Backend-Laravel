@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Categories</h1>
                <p class="text-gray-400">Manage your product categories</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('categories.create') }}" class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg shadow-cyan-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Category
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

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-3 mb-6">
            <a href="{{ route('categories.search') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
                Search Categories
            </a>
            <a href="{{ route('categories.trashed') }}" class="bg-amber-600/80 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                View Trashed Categories
            </a>
        </div>

        <!-- Categories Card -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-8">
            <div class="p-6 border-b border-gray-700/50 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    All Categories
                </h2>
                <span class="bg-gray-700/50 text-gray-300 text-sm py-1 px-3 rounded-full">
                    {{ $categories->total() }} {{ Str::plural('Category', $categories->total()) }}
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-900/70 text-gray-400 text-sm">
                            <th class="py-3 px-6 text-left font-medium">ID</th>
                            <th class="py-3 px-6 text-left font-medium">Name</th>
                            <th class="py-3 px-6 text-center font-medium">Products</th>
                            <th class="py-3 px-6 text-center font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800/50">
                        @forelse($categories as $category)
                            <tr class="hover:bg-gray-700/30 transition-colors duration-150">
                                <td class="py-3 px-6 text-gray-300">{{ $category->cat_id }}</td>
                                <td class="py-3 px-6 text-gray-200 font-medium">{{ $category->cat_name }}</td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-gray-700/50 text-gray-300 text-xs py-1 px-2 rounded-full">
                                        {{ $category->products_count ?? 0 }}
                                    </span>
                                </td>
                                <td class="py-3 px-6">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('categories.show', $category->cat_id) }}" class="p-2 bg-gray-700/50 hover:bg-gray-700 text-gray-300 hover:text-white rounded-lg transition-colors" title="View">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('categories.edit', $category->cat_id) }}" class="p-2 bg-cyan-600/20 hover:bg-cyan-600/40 text-cyan-400 hover:text-cyan-300 rounded-lg transition-colors" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->cat_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-rose-600/20 hover:bg-rose-600/40 text-rose-400 hover:text-rose-300 rounded-lg transition-colors" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <p class="text-lg">No categories found</p>
                                        <p class="text-sm text-gray-600 mt-1">Create your first category to get started</p>
                                        <a href="{{ route('categories.create') }}" class="mt-4 bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-all duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                            </svg>
                                            Add Category
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($categories->hasPages())
                <div class="p-4 border-t border-gray-700/50 bg-gray-900/30">
                    {{ $categories->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 p-6 shadow-xl">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Total Categories</p>
                        <p class="text-2xl font-bold text-white">{{ $categories->total() }}</p>
                    </div>
                    <div class="p-3 bg-cyan-600/10 rounded-lg border border-cyan-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 p-6 shadow-xl">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Products Categorized</p>
                        <p class="text-2xl font-bold text-white">{{ $totalProducts ?? 0 }}</p>
                    </div>
                    <div class="p-3 bg-emerald-600/10 rounded-lg border border-emerald-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 p-6 shadow-xl">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400 text-sm mb-1">Trashed Categories</p>
                        <p class="text-2xl font-bold text-white">{{ $trashedCount ?? 0 }}</p>
                    </div>
                    <div class="p-3 bg-amber-600/10 rounded-lg border border-amber-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
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
    
    /* Glow effects */
    .bg-cyan-600\/10 {
        box-shadow: 0 0 10px rgba(8, 145, 178, 0.1);
    }
    
    .bg-emerald-600\/10 {
        box-shadow: 0 0 10px rgba(5, 150, 105, 0.1);
    }
    
    .bg-amber-600\/10 {
        box-shadow: 0 0 10px rgba(217, 119, 6, 0.1);
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
</style>
@endsection