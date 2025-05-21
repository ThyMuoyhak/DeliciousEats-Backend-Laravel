@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Dashboard Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <div class="mb-4 md:mb-0">
            <h1 class="text-3xl font-bold text-gray-100">Dashboard</h1>
            <p class="text-gray-400 mt-1">Welcome back to DeliciousEats admin panel</p>
        </div>
        
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Products -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl border border-gray-700/50 overflow-hidden relative group">
            <div class="absolute inset-0 bg-cyan-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-gray-400 font-medium mb-1">Total Products</h2>
                        <p class="text-4xl font-bold text-white mb-3">{{ $totalProducts }}</p>
                        <div class="flex items-center text-sm">
                            <span class="text-emerald-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                +5%
                            </span>
                            <span class="text-gray-500 ml-2">from last month</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-lg bg-cyan-600/10 border border-cyan-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a2 2 0 00-2 2v4a2 2 0 002 2h4a2 2 0 002-2V4a2 2 0 00-2-2h-4zm-8 8a2 2 0 012-2h4a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2v-8zm12 0a2 2 0 012-2h4a2 2 0 012 2v8a2 2 0 01-2 2h-4a2 2 0 01-2-2v-8z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Products in Stock -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl border border-gray-700/50 overflow-hidden relative group">
            <div class="absolute inset-0 bg-emerald-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-gray-400 font-medium mb-1">Products in Stock</h2>
                        <p class="text-4xl font-bold text-white mb-3">{{ $productsInStock }}</p>
                        <div class="flex items-center text-sm">
                            <span class="text-emerald-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                +10%
                            </span>
                            <span class="text-gray-500 ml-2">from last month</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-lg bg-emerald-600/10 border border-emerald-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Low Stock Products -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl border border-gray-700/50 overflow-hidden relative group">
            <div class="absolute inset-0 bg-amber-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-gray-400 font-medium mb-1">Low Stock Products</h2>
                        <p class="text-4xl font-bold text-white mb-3">{{ $lowStockProducts }}</p>
                        <div class="flex items-center text-sm">
                            <span class="text-rose-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                                -2%
                            </span>
                            <span class="text-gray-500 ml-2">from last month</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-lg bg-amber-600/10 border border-amber-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.736 6.979C9.208 6.193 9.696 6 10 6c.304 0 .792.193 1.264.979a1 1 0 001.715-1.029C12.279 4.784 11.232 4 10 4s-2.279.784-2.979 1.95c-.285.475.097 1.029.721 1.029zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar and Time in Cambodia -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl border border-gray-700/50 p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-200 mb-4 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
            </svg>
            Cambodia Calendar & Time
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Calendar -->
            <div class="bg-gray-900/70 rounded-xl border border-gray-700/50 p-5 shadow-inner">
                <div class="text-center">
                    <p class="font-bold mb-4 text-gray-200">April 2025</p>
                    <div class="grid grid-cols-7 gap-1 text-xs">
                        <div class="font-medium text-gray-400 p-2">Sun</div>
                        <div class="font-medium text-gray-400 p-2">Mon</div>
                        <div class="font-medium text-gray-400 p-2">Tue</div>
                        <div class="font-medium text-gray-400 p-2">Wed</div>
                        <div class="font-medium text-gray-400 p-2">Thu</div>
                        <div class="font-medium text-gray-400 p-2">Fri</div>
                        <div class="font-medium text-gray-400 p-2">Sat</div>
                        
                        <!-- Sample days (replace with dynamic calendar) -->
                        <div class="p-2"></div>
                        <div class="p-2"></div>
                        <div class="p-2 text-gray-300">1</div>
                        <div class="p-2 text-gray-300">2</div>
                        <div class="p-2 text-gray-300">3</div>
                        <div class="p-2 text-gray-300">4</div>
                        <div class="p-2 text-gray-300">5</div>
                        
                        <div class="p-2 text-gray-300">6</div>
                        <div class="p-2 text-gray-300">7</div>
                        <div class="p-2 text-gray-300">8</div>
                        <div class="p-2 text-gray-300">9</div>
                        <div class="p-2 text-gray-300">10</div>
                        <div class="p-2 text-gray-300">11</div>
                        <div class="p-2 text-gray-300">12</div>
                        
                        <div class="p-2 text-gray-300">13</div>
                        <div class="p-2 text-gray-300">14</div>
                        <div class="p-2 text-gray-300">15</div>
                        <div class="p-2 text-gray-300">16</div>
                        <div class="p-2 text-gray-300">17</div>
                        <div class="p-2 text-gray-300">18</div>
                        <div class="p-2 text-gray-300">19</div>
                        
                        <div class="p-2 text-gray-300">20</div>
                        <div class="p-2 text-gray-300">21</div>
                        <div class="p-2 text-gray-300">22</div>
                        <div class="p-2 text-gray-300">23</div>
                        <div class="p-2 bg-cyan-600/20 rounded-full text-cyan-300 font-medium">24</div>
                        <div class="p-2 text-gray-300">25</div>
                        <div class="p-2 text-gray-300">26</div>
                        
                        <div class="p-2 text-gray-300">27</div>
                        <div class="p-2 text-gray-300">28</div>
                        <div class="p-2 text-gray-300">29</div>
                        <div class="p-2 text-gray-300">30</div>
                        <div class="p-2"></div>
                        <div class="p-2"></div>
                        <div class="p-2"></div>
                    </div>
                </div>
            </div>
            
            <!-- Current Time in Cambodia -->
            <div class="bg-gray-900/70 rounded-xl border border-gray-700/50 p-5 shadow-inner flex items-center justify-center">
                <div class="text-center">
                    <p class="text-sm font-medium text-gray-400 mb-3">Current Time in Cambodia (ICT, UTC+7)</p>
                    <div class="relative">
                        <div class="absolute inset-0 bg-cyan-600/10 blur-xl rounded-full"></div>
                        <p id="cambodiaTime" class="text-4xl font-bold text-white relative">11:54:00 AM</p>
                    </div>
                    <p id="cambodiaDate" class="text-sm text-gray-400 mt-3">Thursday, April 24, 2025</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl border border-gray-700/50 overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-700/50 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                </svg>
                Products List
            </h2>
            <div class="flex items-center gap-2">
                <div class="relative">
                    <input type="text" placeholder="Search products..." class="bg-gray-900/70 border border-gray-700/50 rounded-lg py-2 pl-10 pr-4 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button class="bg-cyan-600 hover:bg-cyan-700 text-white py-2 px-4 rounded-lg transition duration-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Product
                </button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-900/70 text-gray-400 text-sm">
                        <th class="py-3 px-4 text-left font-medium">Image</th>
                        <th class="py-3 px-4 text-left font-medium">Code</th>
                        <th class="py-3 px-4 text-left font-medium">Name</th>
                        <th class="py-3 px-4 text-left font-medium">Category</th>
                        <th class="py-3 px-4 text-left font-medium">Quantity</th>
                        <th class="py-3 px-4 text-left font-medium">Price</th>
                        <th class="py-3 px-4 text-left font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-800/50 transition duration-150">
                            <td class="py-3 px-4">
                                    @if ($product->image)
                                        <img 
                                            src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : Storage::url($product->image) }}" 
                                            alt="{{ $product->pro_name }}" 
                                            class="h-14 w-14 object-cover rounded-lg border border-gray-700/50 shadow-md" 
                                            loading="lazy" 
                                            onerror="this.src='/images/fallback.jpg'"
                                        >
                                    @else
                                        <div class="h-14 w-14 rounded-lg bg-gray-700/50 flex items-center justify-center text-gray-500 border border-gray-700/50">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                            <td class="py-3 px-4 text-gray-300">{{ $product->pro_code }}</td>
                            <td class="py-3 px-4 text-gray-200 font-medium">{{ $product->pro_name }}</td>
                            <td class="py-3 px-4 text-gray-300">
                                <span class="px-2 py-1 bg-gray-800 rounded-md text-xs font-medium">
                                    {{ $product->category ? $product->category->cat_name : 'No Category' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-gray-300">
                                @if($product->qty > 10)
                                    <span class="text-emerald-400">{{ $product->qty }}</span>
                                @elseif($product->qty > 0)
                                    <span class="text-amber-400">{{ $product->qty }}</span>
                                @else
                                    <span class="text-rose-400">Out of stock</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-gray-300">${{ number_format($product->price, 2) }}</td>
                            <td class="py-3 px-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('products.edit', $product->pro_id) }}" class="p-2 bg-cyan-600/10 hover:bg-cyan-600/20 text-cyan-400 rounded-md transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->pro_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-rose-600/10 hover:bg-rose-600/20 text-rose-400 rounded-md transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-6 text-center text-gray-500">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="p-4 border-t border-gray-700/50 bg-gray-900/30">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Showing <span class="font-medium text-gray-300">1</span> to <span class="font-medium text-gray-300">10</span> of <span class="font-medium text-gray-300">{{ count($products) }}</span> products
                </div>
                <div class="flex gap-2">
                    <button class="px-3 py-1 rounded bg-gray-800 text-gray-400 hover:bg-gray-700 disabled:opacity-50 disabled:cursor-not-allowed">
                        Previous
                    </button>
                    <button class="px-3 py-1 rounded bg-cyan-600/20 text-cyan-400 font-medium">
                        1
                    </button>
                    <button class="px-3 py-1 rounded bg-gray-800 text-gray-400 hover:bg-gray-700">
                        2
                    </button>
                    <button class="px-3 py-1 rounded bg-gray-800 text-gray-400 hover:bg-gray-700">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateCambodiaTime() {
            const now = new Date();
            // Cambodia is UTC+7 (no DST)
            const cambodiaTime = new Date(now.getTime() + 7 * 60 * 60 * 1000);
            const hours = cambodiaTime.getUTCHours() % 12 || 12;
            const minutes = String(cambodiaTime.getUTCMinutes()).padStart(2, '0');
            const seconds = String(cambodiaTime.getUTCSeconds()).padStart(2, '0');
            const ampm = cambodiaTime.getUTCHours() >= 12 ? 'PM' : 'AM';
            const day = cambodiaTime.getUTCDate();
            const month = cambodiaTime.toLocaleString('en-US', { month: 'long' });
            const year = cambodiaTime.getUTCFullYear();
            const weekday = cambodiaTime.toLocaleString('en-US', { weekday: 'long' });

            document.getElementById('cambodiaTime').textContent = `${hours}:${minutes}:${seconds} ${ampm}`;
            document.getElementById('cambodiaDate').textContent = `${weekday}, ${month} ${day}, ${year}`;
        }

        updateCambodiaTime();
        setInterval(updateCambodiaTime, 1000);
    });
</script>

<style>
    /* Glow effects */
    #cambodiaTime {
        text-shadow: 0 0 15px rgba(6, 182, 212, 0.5);
    }
    
    .bg-cyan-600\/10 {
        box-shadow: 0 0 10px rgba(8, 145, 178, 0.1);
    }
    
    .bg-emerald-600\/10 {
        box-shadow: 0 0 10px rgba(5, 150, 105, 0.1);
    }
    
    .bg-amber-600\/10 {
        box-shadow: 0 0 10px rgba(217, 119, 6, 0.1);
    }
    
    .bg-rose-600\/10 {
        box-shadow: 0 0 10px rgba(225, 29, 72, 0.1);
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Table styles */
    table {
        border-collapse: separate;
        border-spacing: 0;
    }
    
    /* Calendar day hover effect */
    .grid-cols-7 > div:not(:empty):not(.bg-cyan-600\/20):hover {
        background-color: rgba(8, 145, 178, 0.1);
        border-radius: 9999px;
        cursor: pointer;
    }
</style>
@endsection