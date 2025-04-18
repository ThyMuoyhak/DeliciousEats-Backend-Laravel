<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Employee</title>
     <!-- Favicon -->
     <link rel="icon" href="https://www.shutterstock.com/image-vector/vector-cat-face-minimalist-adorable-600nw-2426797721.jpg" type="image/x-icon">
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
        <div class="bg-gray-800 text-white w-64 min-h-screen p-4">
            <h1 class="text-2xl font-bold mb-6 flex items-center font-poppins">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
                Dashboard
            </h1>
            <ul>
                <li class="mb-2">
                    <a href="/dashboard" class="font-poppins flex items-center p-2 hover:bg-gray-700 rounded transition duration-200">
                        <span class="material-icons mr-2">dashboard</span>
                        Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="/employees" class="font-poppins flex items-center p-2 hover:bg-gray-700 rounded transition duration-200">
                        <span class="material-icons mr-2">people</span>
                        Employees
                    </a>
                </li>
                <li class="mb-2">
                    <a href="/projects" class="font-poppins flex items-center p-2 hover:bg-gray-700 rounded transition duration-200">
                        <span class="material-icons mr-2">work</span>
                        Projects
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('messages.index') }}" class="font-poppins flex items-center p-2 hover:bg-gray-700 rounded transition duration-200">
                        <span class="material-icons mr-2">message</span>
                        Messages
                    </a>
                </li>
                <li class="mb-2">
                    <a href="/reports" class="font-poppins flex items-center p-2 hover:bg-gray-700 rounded transition duration-200">
                        <span class="material-icons mr-2">assessment</span>
                        Reports
                    </a>
                </li>
                <li class="mb-2">
                    <a href="/settings" class="font-poppins flex items-center p-2 hover:bg-gray-700 rounded transition duration-200">
                        <span class="material-icons mr-2">settings</span>
                        Settings
                    </a>
                </li>
                <li class="mb-2">
                    <a href="/develop" class="font-poppins flex items-center p-2 hover:bg-gray-700 rounded transition duration-200">
                        <span class="material-icons mr-2">build</span> <!-- Change the icon here -->
                        Develop By
                    </a>
                </li>
                <!-- Logout Button -->
                <li class="mb-2 mt-6">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="font-poppins flex items-center p-2 hover:bg-gray-700 rounded transition duration-200">
                            <span class="material-icons mr-2">logout</span>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

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
