@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8" data-aos="fade-down" data-aos-duration="800">Positions</h1>

    <!-- Add Position Button -->
    <div class="mb-6" data-aos="fade-up" data-aos-delay="100">
        <a href="{{ route('positions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Position
        </a>
    </div>

    <!-- Positions Table (Dark Mode) -->
    <div class="bg-gray-900 p-6 rounded-lg shadow-xl border border-gray-800" data-aos="fade-up" data-aos-delay="200">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 rounded-lg shadow-lg">
                <thead data-aos="fade-right" data-aos-delay="300">
                    <tr class="text-gray-300 bg-gray-700 border-b border-gray-600">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($positions as $position)
                        <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-200" data-aos="fade-left" data-aos-delay="400">
                            <td class="px-6 py-4 text-gray-200">{{ $position->id }}</td>
                            <td class="px-6 py-4 text-gray-200">{{ $position->name }}</td>
                            <td class="px-6 py-4">
                                <!-- Edit Link -->
                                <a href="{{ route('positions.edit', $position->id) }}" class="text-blue-400 hover:text-blue-300 font-medium mr-3" data-aos="zoom-in" data-aos-delay="500">
                                    Edit
                                </a>
                                <!-- Delete Link (using a form to securely delete the position) -->
                                <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;" data-aos="zoom-in" data-aos-delay="600" onsubmit="return confirm('Are you sure you want to delete this position?');">
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