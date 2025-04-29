@extends('layouts.app')

@section('content')
    <div class="px-6 py-8 bg-gray-900 text-gray-100">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-gray-100" data-aos="fade-right">Dashboard</h1>
            <div data-aos="fade-left">
                <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition duration-300 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Employee
                </button>
            </div>
        </div>

        <!-- Stats Cards (Dark Mode) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Total Employees -->
            <div class="bg-gray-800 bg-opacity-60 p-6 rounded-2xl shadow-xl border border-gray-700 relative overflow-hidden group" data-aos="zoom-in" data-aos-delay="100">
                <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-blue-600 opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-lg font-medium text-gray-400 mb-1">Total Employees</h2>
                        <p class="text-4xl font-bold text-white">{{ $totalEmployees }}</p>
                        <div class="flex items-center mt-3 text-sm">
                            <span class="text-green-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                +5%
                            </span>
                            <span class="text-gray-400 ml-2">from last month</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-xl bg-gray-900 bg-opacity-70 border border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Active Employees -->
            <div class="bg-gray-800 bg-opacity-60 p-6 rounded-2xl shadow-xl border border-gray-700 relative overflow-hidden group" data-aos="zoom-in" data-aos-delay="200">
                <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-green-600 opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-lg font-medium text-gray-400 mb-1">Active Employees</h2>
                        <p class="text-4xl font-bold text-white">{{ $activeEmployees }}</p>
                        <div class="flex items-center mt-3 text-sm">
                            <span class="text-green-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                +10%
                            </span>
                            <span class="text-gray-400 ml-2">from last month</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-xl bg-gray-900 bg-opacity-70 border border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- On Leave -->
            <div class="bg-gray-800 bg-opacity-60 p-6 rounded-2xl shadow-xl border border-gray-700 relative overflow-hidden group" data-aos="zoom-in" data-aos-delay="300">
                <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-yellow-600 opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-lg font-medium text-gray-400 mb-1">On Leave</h2>
                        <p class="text-4xl font-bold text-white">{{ $onLeaveEmployees }}</p>
                        <div class="flex items-center mt-3 text-sm">
                            <span class="text-red-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                                -2%
                            </span>
                            <span class="text-gray-400 ml-2">from last month</span>
                        </div>
                    </div>
                    <div class="p-3 rounded-xl bg-gray-900 bg-opacity-70 border border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

<!-- Calendar and Time in Cambodia -->
<div class="bg-gray-800 bg-opacity-60 p-6 rounded-2xl shadow-xl border border-gray-700 mb-10" data-aos="fade-up" data-aos-delay="350">
    <h2 class="text-lg font-medium text-gray-400 mb-4">Cambodia Calendar & Time</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Calendar -->
        <div class="relative">
            <div id="calendar" class="bg-gray-900 p-4 rounded-xl text-gray-200">
                <!-- Placeholder for Calendar -->
                <div class="text-center text-sm">
                    <p class="font-bold mb-2">April 2025</p>
                    <div class="grid grid-cols-7 gap-1 text-xs">
                        <div class="font-medium">Sun</div>
                        <div class="font-medium">Mon</div>
                        <div class="font-medium">Tue</div>
                        <div class="font-medium">Wed</div>
                        <div class="font-medium">Thu</div>
                        <div class="font-medium">Fri</div>
                        <div class="font-medium">Sat</div>
                        <!-- Sample days (replace with dynamic calendar) -->
                        <div></div><div></div><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                        <div>6</div><div>7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div>
                        <div>13</div><div>14</div><div>15</div><div>16</div><div>17</div><div>18</div><div>19</div>
                        <div>20</div><div>21</div><div>22</div><div>23</div><div class="bg-blue-600 rounded-full">24</div><div>25</div><div>26</div>
                        <div>27</div><div>28</div><div>29</div><div>30</div><div></div><div></div><div></div>
                    </div>
                </div>
            </div>
            <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-purple-600 opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
        </div>
        <!-- Current Time in Cambodia -->
        <div class="relative flex items-center justify-center">
            <div class="text-center">
                <p class="text-sm font-medium text-gray-400 mb-2">Current Time in Cambodia (ICT, UTC+7)</p>
                <p id="cambodiaTime" class="text-4xl font-bold text-white">11:54:00 AM</p>
                <p id="cambodiaDate" class="text-sm text-gray-400 mt-2">Thursday, April 24, 2025</p>
            </div>
            <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-purple-600 opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
        </div>
    </div>
</div>

        <!-- Enhanced Search & Filters -->
<div class="mb-8" data-aos="fade-up">
    <form method="GET" action="{{ route('employees.index') }}" id="searchForm">
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Search Input -->
            <div class="relative flex-grow">
                <input 
                    type="text" 
                    name="search" 
                    id="searchInput"
                    placeholder="Search by name, position, department or email..." 
                    class="pl-10 pr-4 py-3 w-full rounded-xl bg-gray-800 border border-gray-700 text-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-500 transition duration-300"
                    value="{{ request('search') }}"
                    autocomplete="off"
                >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 absolute left-3 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <div id="loadingIndicator" class="hidden absolute right-3 top-3.5">
                    <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>

            <!-- Department Filter -->
            <select 
            name="department"
            class="bg-gray-800 border border-gray-700 text-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
        >
            <option value="">All Departments</option>
            <option value="HR" {{ request('department') == 'HR' ? 'selected' : '' }}>HR</option>
            <option value="Engineering" {{ request('department') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
            <option value="Marketing" {{ request('department') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
            <option value="Sales" {{ request('department') == 'Sales' ? 'selected' : '' }}>Sales</option>
        </select>

            <!-- Status Filter -->
            <select 
                name="status"
                class="bg-gray-800 border border-gray-700 text-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
            >
                <option value="">All Status</option>
                <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="On Leave" {{ request('status') == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>

            <!-- Action Buttons -->
            <div class="flex gap-4">
                <button 
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-xl transition duration-300 flex items-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Filter
                </button>
                <a 
                    href="{{ route('employees.index') }}"
                    class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-3 rounded-xl transition duration-300 flex items-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Reset
                </a>
            </div>
        </div>
    </form>
</div>

        <!-- Employee Table (Dark Mode) -->
        <div class="bg-gray-800 rounded-2xl shadow-xl border border-gray-700 overflow-hidden" data-aos="fade-up" data-aos-delay="400">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead>
                        <tr class="bg-gray-900">
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider cursor-pointer hover:text-gray-300" onclick="sortTable('name')">
                                <div class="flex items-center">
                                    Name
                                    @include('partials.sort-icon', ['field' => 'name'])
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider cursor-pointer hover:text-gray-300" onclick="sortTable('position')">
                                <div class="flex items-center">
                                    Position
                                    @include('partials.sort-icon', ['field' => 'position'])
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider cursor-pointer hover:text-gray-300" onclick="sortTable('department')">
                                <div class="flex items-center">
                                    Department
                                    @include('partials.sort-icon', ['field' => 'department'])
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider cursor-pointer hover:text-gray-300" onclick="sortTable('status')">
                                <div class="flex items-center">
                                    Status
                                    @include('partials.sort-icon', ['field' => 'status'])
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($employees as $employee)
                            <tr class="hover:bg-gray-700 transition duration-150" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 bg-gray-900 rounded-full flex items-center justify-center text-gray-300 border border-gray-700">
                                            {{ substr($employee->name, 0, 1) }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-200">{{ $employee->name }}</div>
                                            <div class="text-sm text-gray-400">employee-{{ $employee->id }}@company.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-200">{{ $employee->position }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-200">{{ $employee->department }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $employee->status == 'Active' ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                        {{ $employee->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="text-blue-400 hover:text-blue-300 transition duration-200 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </a>
                                    
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 transition duration-200 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Products Table -->
   

            
            <!-- Dark Mode Pagination -->
            <div class="px-6 py-4 bg-gray-900 border-t border-gray-700">
                {{ $employees->links('vendor.pagination.tailwind') }}
            </div>
        </div>
        <br> <br>
        <div class="overflow-x-auto" data-aos="fade-up" data-aos-delay="200">
            <table class="w-full border-collapse rounded-xl overflow-hidden border border-gray-700 bg-gray-800">
                <thead>
                    <tr class="bg-gray-700 text-gray-300">
                        <th class="border border-gray-700 p-3 text-left">Image</th>
                        <th class="border border-gray-700 p-3 text-left">Code</th>
                        <th class="border border-gray-700 p-3 text-left">Name</th>
                        <th class="border border-gray-700 p-3 text-left">Category</th>
                        <th class="border border-gray-700 p-3 text-left">Quantity</th>
                        <th class="border border-gray-700 p-3 text-left">Price</th>
                        <th class="border border-gray-700 p-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-700 transition duration-150">
                            <td class="px-4 py-2 text-sm text-gray-800">
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->pro_name }}" class="h-16 w-16 object-cover rounded">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td class="border border-gray-700 p-3">{{ $product->pro_code }}</td>
                            <td class="border border-gray-700 p-3">{{ $product->pro_name }}</td>
                            <td class="border border-gray-700 p-3">{{ $product->category ? $product->category->name : 'No Category' }}</td>
                            <td class="border border-gray-700 p-3">{{ $product->qty }}</td>
                            <td class="border border-gray-700 p-3">{{ number_format($product->price, 2) }}</td>
                            <td class="border border-gray-700 p-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('products.edit', $product->pro_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                        Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->pro_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border border-gray-700 p-4 text-center text-gray-400">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <br> <br>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-6 py-6 bg-gray-800 bg-opacity-60 p-6 rounded-2xl shadow-xl border border-gray-700 relative">
            <a href="/dashboard" data-aos="fade-up" data-aos-duration="1000" class="{{ request()->is('dashboard') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>Dashboard
            </a>
            <a href="/employees" data-aos="fade-up" data-aos-duration="1200" class="{{ request()->is('employees*') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-users w-5 h-5 mr-3"></i>Employees
            </a>
            <a href="/projects" data-aos="fade-up" data-aos-duration="1400" class="{{ request()->is('projects') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-briefcase w-5 h-5 mr-3"></i>Projects
            </a>
            <a href="{{ route('messages.index') }}" data-aos="fade-up" data-aos-duration="1600" class="{{ request()->is('messages*') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-envelope w-5 h-5 mr-3"></i>Messages
            </a>
            <a href="/reports" data-aos="fade-up" data-aos-duration="1800" class="{{ request()->is('reports') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-chart-bar w-5 h-5 mr-3"></i>Reports
            </a>
            <a href="/settings" data-aos="fade-up" data-aos-duration="2000" class="{{ request()->is('settings') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-cog w-5 h-5 mr-3"></i>Settings
            </a>
            <a href="/develop" data-aos="fade-up" data-aos-duration="2200" class="{{ request()->is('develop') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-code w-5 h-5 mr-3"></i>Develop By
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="2400" class="{{ request()->is('clients') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-handshake w-5 h-5 mr-3"></i>Clients
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="2600" class="{{ request()->is('tasks') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-tasks w-5 h-5 mr-3"></i>Tasks
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="2800" class="{{ request()->is('calendar') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-calendar-alt w-5 h-5 mr-3"></i>Calendar
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="3000" class="{{ request()->is('announcements') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-bullhorn w-5 h-5 mr-3"></i>Announcements
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="3200" class="{{ request()->is('attendance') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-user-check w-5 h-5 mr-3"></i>Attendance
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="3400" class="{{ request()->is('departments') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-building w-5 h-5 mr-3"></i>Departments
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="3600" class="{{ request()->is('leaves') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-plane-departure w-5 h-5 mr-3"></i>Leaves
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="3800" class="{{ request()->is('payroll') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-money-bill-wave w-5 h-5 mr-3"></i>Payroll
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="4000" class="{{ request()->is('notifications') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-bell w-5 h-5 mr-3"></i>Notifications
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="4200" class="{{ request()->is('files') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-folder-open w-5 h-5 mr-3"></i>Files
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="4400" class="{{ request()->is('logs') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-history w-5 h-5 mr-3"></i>Logs
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="4600" class="{{ request()->is('support') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-life-ring w-5 h-5 mr-3"></i>Support
            </a>
            <a href="#" data-aos="fade-up" data-aos-duration="4800" class="{{ request()->is('profile') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 transition-all duration-200">
                <i class="fas fa-user-circle w-5 h-5 mr-3"></i>Profile
            </a>
        </div>

    </div>

   
    
    

    <!-- Glow Effects (Dark Mode Specific) -->
    <style>
        .bg-gray-800 {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
        .bg-blue-600, .bg-green-600, .bg-yellow-600 {
            filter: blur(30px);
        }
        .text-blue-400, .text-green-400, .text-yellow-400 {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
        }
    </style>

    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    </script>

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

    document.addEventListener('DOMContentLoaded', function() {
        // Live search with debounce
        const searchInput = document.getElementById('searchInput');
        const form = document.getElementById('searchForm');
        const loadingIndicator = document.getElementById('loadingIndicator');
        let timer;
    
        searchInput.addEventListener('input', function() {
            loadingIndicator.classList.remove('hidden');
            clearTimeout(timer);
            timer = setTimeout(() => {
                form.submit();
            }, 500);
        });
    
        // Prevent form submission on Enter key to allow live search
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                form.submit();
            }
        });
    
        // Hide loading when form submits (for browsers that don't replace the page)
        form.addEventListener('submit', function() {
            loadingIndicator.classList.remove('hidden');
        });
    });
    
    // Sorting function
    function sortTable(field) {
        const url = new URL(window.location.href);
        const sort = url.searchParams.get('sort');
        const direction = url.searchParams.get('direction');
    
        if (sort === field) {
            url.searchParams.set('direction', direction === 'asc' ? 'desc' : 'asc');
        } else {
            url.searchParams.set('sort', field);
            url.searchParams.set('direction', 'asc');
        }
    
        window.location.href = url.toString();
    }
    </script>
@endsection