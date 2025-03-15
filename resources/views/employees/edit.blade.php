@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-6 rounded-md" data-aos="fade-up">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 mb-6 rounded-md" data-aos="fade-up">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold mb-8" data-aos="fade-down">Edit Employee</h1>

    <!-- Edit Employee Form -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg" data-aos="fade-up">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Employee Name -->
            <div class="mb-4" data-aos="fade-left" data-aos-delay="100">
                <label for="name" class="block text-sm font-medium mb-2">Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $employee->name }}" required>
            </div>

            <!-- Position -->
            <div class="mb-4" data-aos="fade-left" data-aos-delay="200">
                <label for="position" class="block text-sm font-medium mb-2">Position</label>
                <input type="text" name="position" id="position" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $employee->position }}" required>
            </div>

            <!-- Department -->
            <div class="mb-4" data-aos="fade-left" data-aos-delay="300">
                <label for="department" class="block text-sm font-medium mb-2">Department</label>
                <input type="text" name="department" id="department" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $employee->department }}" required>
            </div>

            <!-- Status -->
            <div class="mb-4" data-aos="fade-left" data-aos-delay="400">
                <label for="status" class="block text-sm font-medium mb-2">Status</label>
                <select name="status" id="status" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="Active" {{ $employee->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $employee->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="On Leave" {{ $employee->status == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mt-6" data-aos="fade-up" data-aos-delay="500">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
