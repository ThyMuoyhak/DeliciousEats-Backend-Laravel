@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8" data-aos="fade-down">Employee List</h1>

    <!-- Add Employee Button -->
    <div class="mb-6" data-aos="fade-up" data-aos-delay="100">
        <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Employee
        </a>
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
            
            <!-- Dark Mode Pagination -->
            <div class="px-6 py-4 bg-gray-900 border-t border-gray-700">
                {{ $employees->links('vendor.pagination.tailwind') }}
            </div>
        </div>

        <script>
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

    <script>
        AOS.init({
            duration: 1000, // Animation duration in milliseconds
            easing: 'ease-in-out', // Easing type
            once: true, // Whether animation should happen only once
        });
    </script>
@endsection
