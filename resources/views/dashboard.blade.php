@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8  font-[Poppins]">Employee Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Employees -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-2 font-[Poppins]">Total Employees</h2>
            <p class="text-2xl font-bold text-blue-400">1,234</p>
            <p class="text-gray-400 text-sm">+5% from last month</p>
        </div>
        <!-- Active Employees -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-2">Active Employees</h2>
            <p class="text-2xl font-bold text-green-400">1,200</p>
            <p class="text-gray-400 text-sm">+10% from last month</p>
        </div>
        <!-- On Leave -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-2">On Leave</h2>
            <p class="text-2xl font-bold text-yellow-400">34</p>
            <p class="text-gray-400 text-sm">-2% from last month</p>
        </div>
    </div>

     <!-- Employee Table -->
     <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-700 rounded-lg">
                <thead>
                    <tr class="text-left border-b border-gray-600">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Position</th>
                        <th class="px-4 py-3">Department</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr class="hover:bg-gray-600 transition duration-200">
                            <td class="px-4 py-3">{{ $employee->name }}</td>
                            <td class="px-4 py-3">{{ $employee->position }}</td>
                            <td class="px-4 py-3">{{ $employee->department }}</td>
                            <td class="px-4 py-3">
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-sm">{{ $employee->status }}</span>
                            </td>
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