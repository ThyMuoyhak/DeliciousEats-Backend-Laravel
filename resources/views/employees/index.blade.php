<!-- resources/views/employees/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gray-900 text-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold mb-6" data-aos="fade-down">Employee List</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-800 border border-green-600 text-green-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="100">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if (session('error'))
        <div class="bg-red-800 border border-red-600 text-red-200 px-4 py-3 rounded mb-6" data-aos="fade-up" data-aos-delay="150">
            {{ session('error') }}
        </div>
    @endif

    <!-- Add Employee Button -->
    <div class="mb-6" data-aos="fade-up" data-aos-delay="200">
        <a href="{{ route('employees.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200 inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Employee
        </a>
    </div>

    <!-- Employee Table -->
    <div class="overflow-x-auto" data-aos="fade-up" data-aos-delay="250">
        <table class="w-full border-collapse rounded-xl overflow-hidden border border-gray-700 bg-gray-800">
            <thead>
                <tr class="bg-gray-700 text-gray-300">
                    <th class="border border-gray-700 p-3 text-left">Name</th>
                    <th class="border border-gray-700 p-3 text-left">Position</th>
                    <th class="border border-gray-700 p-3 text-left">Department</th>
                    <th class="border border-gray-700 p-3 text-left">Status</th>
                    <th class="border border-gray-700 p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                    <tr class="hover:bg-gray-700 transition duration-150" data-aos="fade-right" data-aos-delay="{{ $loop->index * 50 }}">
                        <td class="border border-gray-700 p-3">{{ $employee->name }}</td>
                        <td class="border border-gray-700 p-3">{{ $employee->position }}</td>
                        <td class="border border-gray-700 p-3">{{ $employee->department }}</td>
                        <td class="border border-gray-700 p-3">
                            <span class="px-3 py-1 text-sm font-semibold rounded-full
                                {{ $employee->status == 'Active' ? 'bg-green-600 text-white' : 
                                   $employee->status == 'Inactive' ? 'bg-red-600 text-white' : 
                                   'bg-yellow-600 text-white' }}">
                                {{ $employee->status }}
                            </span>
                        </td>
                        <td class="border border-gray-700 p-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('employees.edit', $employee->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded transition duration-200">
                                    Edit
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
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
                        <td colspan="5" class="border border-gray-700 p-4 text-center text-gray-400">No employees found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6" data-aos="fade-up" data-aos-delay="300">
        {{ $employees->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection

@push('scripts')
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
    });
</script>
@endpush

@push('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
@endpush