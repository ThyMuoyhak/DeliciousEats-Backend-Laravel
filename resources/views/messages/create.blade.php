@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Compose Message</h1>

    <!-- Compose Message Form -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <!-- To -->
            <div class="mb-4">
                <label for="to" class="block text-sm font-medium mb-2">To</label>
                <input type="email" name="to" id="to" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <!-- Subject -->
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium mb-2">Subject</label>
                <input type="text" name="subject" id="subject" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <!-- Message -->
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium mb-2">Message</label>
                <textarea name="message" id="message" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:border-blue-500" rows="6" required></textarea>
            </div>
            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Send Message
                </button>
            </div>
        </form>
    </div>
@endsection