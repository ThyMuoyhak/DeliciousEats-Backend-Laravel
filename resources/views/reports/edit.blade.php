@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Edit Report: {{ $report->name }}</h1>

    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('reports.update', $report->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Report Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-2">Report Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $report->name }}" required>
            </div>

            <!-- Report Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>{{ $report->description }}</textarea>
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
