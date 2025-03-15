@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8" data-aos="fade-down" data-aos-duration="800">Add New Project</h1>

    <!-- Add Project Form -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="800">
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <!-- Project Name -->
            <div class="mb-4" data-aos="fade-right" data-aos-delay="100">
                <label for="name" class="block text-sm font-medium mb-2">Project Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <!-- Description -->
            <div class="mb-4" data-aos="fade-left" data-aos-delay="200">
                <label for="description" class="block text-sm font-medium mb-2">Description</label>
                <textarea name="description" id="description" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" rows="4" required></textarea>
            </div>
            <!-- Status -->
            <div class="mb-4" data-aos="fade-right" data-aos-delay="300">
                <label for="status" class="block text-sm font-medium mb-2">Status</label>
                <select name="status" id="status" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="Active">Active</option>
                    <option value="Completed">Completed</option>
                    <option value="On Hold">On Hold</option>
                </select>
            </div>
            <!-- Start Date -->
            <div class="mb-4" data-aos="fade-left" data-aos-delay="400">
                <label for="start_date" class="block text-sm font-medium mb-2">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <!-- End Date -->
            <div class="mb-4" data-aos="fade-right" data-aos-delay="500">
                <label for="end_date" class="block text-sm font-medium mb-2">End Date</label>
                <input type="date" name="end_date" id="end_date" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <!-- Submit Button -->
            <div class="mt-6" data-aos="zoom-in" data-aos-delay="600">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 hover:scale-105 active:scale-95 transition duration-300 ease-in-out">
                    Add Project
                </button>
            </div>
        </form>
    </div>
@endsection
