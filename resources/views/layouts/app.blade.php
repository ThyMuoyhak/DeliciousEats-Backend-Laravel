<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Employee</title>
     <!-- Favicon -->
     <link rel="icon" href="https://i.ytimg.com/vi/x_9SdeVjfe4/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAHJnuMKW_ny8rT3ZCRZPM8jsPCRQ" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Heroicons (for icons) -->
    <script src="https://unpkg.com/@heroicons/vue@1.0.5/dist/icons.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-poppins">
    <div class="flex">
        <!-- Sidebar -->
        <!-- Sidebar -->
<div class="bg-gradient-to-b from-gray-900 to-gray-800 text-white w-64 min-h-screen p-4 flex flex-col shadow-2xl">
    <!-- Logo and Title -->
    <div class="flex items-center mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
        </svg>
        <h1 class="text-xl font-bold text-gray-100 font-inter">DeliciousEats</h1>
    </div>

    <!-- Navigation -->
    <ul class="flex-1 text-white font-inter text-sm space-y-1">
        <li><a href="/dashboard" class="{{ request()->is('dashboard') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>Dashboard</a></li>
        <li><a href="/employees" class="{{ request()->is('employees*') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-users w-5 h-5 mr-3"></i>Employees</a></li>
        <li>
            <a href="/products" class="{{ request()->is('products') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200">
                <i class="fas fa-box w-5 h-5 mr-3"></i>Products
            </a>
        </li>
        <li>
            <a href="/categories" class="{{ request()->is('products/categories') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200">
                <i class="fas fa-tags w-5 h-5 mr-3"></i>Categories
            </a>
        </li>

        <li>
    <a href="/carts" class="{{ request()->is('products/carts') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200">
        <i class="fas fa-shopping-cart w-5 h-5 mr-3"></i>Carts
    </a>
</li>
        
        <li><a href="/projects" class="{{ request()->is('projects') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-briefcase w-5 h-5 mr-3"></i>Projects</a></li>
        <li><a href="{{ route('messages.index') }}" class="{{ request()->is('messages*') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-envelope w-5 h-5 mr-3"></i>Messages</a></li>
        <li><a href="/reports" class="{{ request()->is('reports') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-chart-bar w-5 h-5 mr-3"></i>Reports</a></li>
        <li><a href="/settings" class="{{ request()->is('settings') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-cog w-5 h-5 mr-3"></i>Settings</a></li>
        <li><a href="/develop" class="{{ request()->is('develop') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-code w-5 h-5 mr-3"></i>Develop By</a></li>
        <li><a href="#" class="{{ request()->is('clients') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-handshake w-5 h-5 mr-3"></i>Clients</a></li>
        <li><a href="#" class="{{ request()->is('tasks') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-tasks w-5 h-5 mr-3"></i>Tasks</a></li>
        <li><a href="#" class="{{ request()->is('calendar') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-calendar-alt w-5 h-5 mr-3"></i>Calendar</a></li>
        <li><a href="#" class="{{ request()->is('announcements') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-bullhorn w-5 h-5 mr-3"></i>Announcements</a></li>
        <li><a href="#" class="{{ request()->is('attendance') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-user-check w-5 h-5 mr-3"></i>Attendance</a></li>
        <li><a href="#" class="{{ request()->is('departments') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-building w-5 h-5 mr-3"></i>Departments</a></li>
        <li><a href="#" class="{{ request()->is('leaves') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-plane-departure w-5 h-5 mr-3"></i>Leaves</a></li>
        <li><a href="#" class="{{ request()->is('payroll') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-money-bill-wave w-5 h-5 mr-3"></i>Payroll</a></li>
        <li><a href="#" class="{{ request()->is('notifications') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-bell w-5 h-5 mr-3"></i>Notifications</a></li>
        <li><a href="#" class="{{ request()->is('files') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-folder-open w-5 h-5 mr-3"></i>Files</a></li>
        <li><a href="#" class="{{ request()->is('logs') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-history w-5 h-5 mr-3"></i>Logs</a></li>
        <li><a href="#" class="{{ request()->is('support') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-life-ring w-5 h-5 mr-3"></i>Support</a></li>
        <li><a href="#" class="{{ request()->is('profile') ? 'bg-gray-700 text-cyan-400 border-l-4 border-cyan-400' : '' }} flex items-center p-3 rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200"><i class="fas fa-user-circle w-5 h-5 mr-3"></i>Profile</a></li>
    </ul>
    

    <!-- User Profile and Logout -->
    <div class="mt-auto border-t border-gray-700 pt-4">
        <div class="flex items-center p-3 mb-2">
            <div class="h-8 w-8 rounded-full bg-gray-600 flex items-center justify-center text-gray-200 font-bold">
                {{ auth()->user()->name[0] ?? 'U' }}
            </div>
            <span class="ml-3 text-sm font-inter text-gray-200">{{ auth()->user()->name ?? 'User' }}</span>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="flex items-center p-3 w-full rounded-lg hover:bg-gray-700 hover:scale-105 transition-all duration-200 font-inter text-sm text-red-400">
                <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
                Logout
            </button>
        </form>
    </div>
</div>

<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<!-- Inter Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">

<style>
    .font-inter {
        font-family: 'Inter', sans-serif;
    }
    .sidebar {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    .hover\:scale-105:hover {
        transform: scale(1.05);
    }
</style>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            @yield('content')
        </div>
        
    </div>
    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-6 mt-8">
        <div class="container mx-auto text-center px-6">
            <p class="text-sm font-medium">
                Developed by <a href="https://web.facebook.com/urfavhak" class="font-semibold text-blue-500" target="_blank" rel="noopener noreferrer">Thy Muoyhak</a>
            </p>
            <p class="text-xs mt-2">
                &copy; 2025 All rights reserved.
            </p>
        </div>
    </footer>

    <script>
        AOS.init();
    </script>
</body>
</html>
