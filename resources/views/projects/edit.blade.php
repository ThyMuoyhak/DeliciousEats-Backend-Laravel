@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8" data-aos="fade-down" data-aos-duration="800">Edit Project</h1>

    <!-- Edit Project Form -->
    <div class="bg-gray-900 p-6 rounded-lg shadow-xl border border-gray-800" data-aos="fade-up" data-aos-delay="100">
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Project Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-2 text-gray-300">Project Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 text-gray-200" value="{{ $project->name }}" required>
            </div>

            <!-- Project Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium mb-2 text-gray-300">Description</label>
                <textarea name="description" id="description" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 text-gray-200" rows="4" required>{{ $project->description }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium mb-2 text-gray-300">Status</label>
                <select name="status" id="status" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="Completed" {{ $project->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="In Progress" {{ $project->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Not Started" {{ $project->status == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                </select>
            </div>

            <!-- Start Date -->
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium mb-2 text-gray-300">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 text-gray-200" value="{{ $project->start_date }}" required>
            </div>

            <!-- End Date -->
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium mb-2 text-gray-300">End Date</label>
                <input type="date" name="end_date" id="end_date" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 text-gray-200" value="{{ $project->end_date }}" required>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
