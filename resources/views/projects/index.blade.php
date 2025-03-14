@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Projects</h1>

    <!-- Add Project Button -->
    <div class="mb-6">
        <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Project
        </a>
    </div>

    <!-- Projects Table -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-700 rounded-lg">
                <thead>
                    <tr class="text-left border-b border-gray-600">
                        <th class="px-4 py-3">Project Name</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Start Date</th>
                        <th class="px-4 py-3">End Date</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr class="hover:bg-gray-600 transition duration-200">
                            <td class="px-4 py-3">{{ $project->name }}</td>
                            <td class="px-4 py-3">{{ $project->description }}</td>
                            <td class="px-4 py-3">
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-sm">{{ $project->status }}</span>
                            </td>
                            <td class="px-4 py-3">{{ $project->start_date }}</td>
                            <td class="px-4 py-3">{{ $project->end_date }}</td>
                            <td class="px-4 py-3">
                                <a href="#" class="text-blue-400 hover:text-blue-300 mr-2">Edit</a>
                                <a href="#" class="text-red-400 hover:text-red-300">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection