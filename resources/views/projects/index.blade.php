@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8" data-aos="fade-down" data-aos-duration="800">Projects</h1>

    <!-- Add Project Button -->
    <div class="mb-6" data-aos="fade-up" data-aos-delay="100">
        <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Project
        </a>
    </div>

    <!-- Projects Table (Dark Mode) -->
    <div class="bg-gray-900 p-6 rounded-lg shadow-xl border border-gray-800" data-aos="fade-up" data-aos-delay="200">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 rounded-lg shadow-lg">
                <thead data-aos="fade-right" data-aos-delay="300">
                    <tr class="text-gray-300 bg-gray-700 border-b border-gray-600">
                        <th class="px-6 py-3 text-left">Project Name</th>
                        <th class="px-6 py-3 text-left">Description</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Start Date</th>
                        <th class="px-6 py-3 text-left">End Date</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-200" data-aos="fade-left" data-aos-delay="400">
                            <td class="px-6 py-4 text-gray-200">{{ $project->name }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $project->description }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm 
                                    {{ $project->status == 'Completed' ? 'bg-green-500 text-white' : 
                                    ($project->status == 'In Progress' ? 'bg-yellow-500 text-white' : 'bg-red-500 text-white') }}">
                                    {{ $project->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-300">{{ $project->start_date }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $project->end_date }}</td>
                            <td class="px-6 py-4">
                                <!-- Edit Link -->
                                <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-400 hover:text-blue-300 font-medium mr-3" data-aos="zoom-in" data-aos-delay="500">
                                    Edit
                                </a>
                            
                                <!-- Delete Link (using a form to securely delete the project) -->
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;" data-aos="zoom-in" data-aos-delay="600">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-medium bg-transparent border-0">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
