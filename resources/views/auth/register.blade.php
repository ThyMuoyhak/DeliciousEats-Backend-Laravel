<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
    <!-- Favicon -->
    <link rel="icon" href="https://www.shutterstock.com/image-vector/vector-cat-face-minimalist-adorable-600nw-2426797721.jpg" type="image/x-icon">
   
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Poppins', 'sans-serif']
          }
        }
      }
    }
  </script>

  <!-- Auto Dark Mode Toggle Based on Preference -->
  <script>
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
  </script>
</head>
<body class="font-sans flex items-center justify-center min-h-screen bg-gray-900 text-white transition-colors duration-300">

  <div class="relative w-full max-w-md p-8 bg-gray-800 rounded-2xl shadow-xl border border-gray-700 transition-all duration-300">
    
    <!-- Theme Toggle -->
    <button id="theme-toggle" type="button" class="absolute top-4 right-4 p-2 rounded-lg bg-gray-700 hover:bg-gray-600 transition-colors">
      <span id="sun-icon" class="hidden dark:inline text-yellow-300 text-lg">☀️</span>
      <span id="moon-icon" class="inline dark:hidden text-gray-300 text-lg">🌙</span>
    </button>

    <div class="text-center mb-6">
      <h2 class="text-3xl font-bold text-white">Create Account</h2>
      <p class="mt-1 text-gray-400">Join our community today</p>
    </div>

    <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
        @csrf <!-- CSRF protection -->
        
        <!-- Full Name -->
        <div>
          <label class="block text-sm font-medium text-gray-300">Full Name</label>
          <input type="text" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your name" required>
        </div>
      
        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-300">Email Address</label>
          <input type="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="your@email.com" required>
        </div>
      
        <!-- Password -->
        <div>
          <label class="block text-sm font-medium text-gray-300">Password</label>
          <input type="password" name="password" class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••" required>
        </div>
      
        <!-- Confirm Password -->
        <div>
          <label class="block text-sm font-medium text-gray-300">Confirm Password</label>
          <input type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••" required>
        </div>
      
        <!-- Submit Button -->
        <button type="submit" class="w-full px-6 py-3 bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg shadow-md transition-all duration-200">
          Register Now
        </button>
      </form>
      

    <p class="mt-5 text-sm text-center text-gray-400">
      Already have an account?
      <a href="/login" class="text-blue-400 hover:underline">Sign in here</a>
    </p>
  </div>

  <!-- Theme Toggle Script -->
  <script>
    document.getElementById('theme-toggle').addEventListener('click', function () {
      document.documentElement.classList.toggle('dark');
      localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
      document.getElementById('sun-icon').classList.toggle('hidden');
      document.getElementById('moon-icon').classList.toggle('hidden');
    });
  </script>

</body>
</html>
