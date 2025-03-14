@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Add New Employee</h1>

    <!-- Add Employee Form -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-2">Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <!-- Position -->
            <div class="mb-4">
                <label for="position" class="block text-sm font-medium mb-2">Position</label>
                <input type="text" name="position" id="position" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <!-- Department -->
            <div class="mb-4">
                <label for="department" class="block text-sm font-medium mb-2">Department</label>
                <select name="department" id="department" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="Engineering">Engineering</option>
                    <option value="Product">Product</option>
                    <option value="Marketing">Marketing</option>
                    <option value="HR">Human Resources</option>
                </select>
            </div>
            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium mb-2">Status</label>
                <select name="status" id="status" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="Active">Active</option>
                    <option value="On Leave">On Leave</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Add Employee
                </button>
            </div>
        </form>
    </div>
@endsection