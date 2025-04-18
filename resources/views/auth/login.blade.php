<!DOCTYPE html>
<html lang="en" class="dark">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dark Mode Login</title>
        <!-- Favicon -->
        <link rel="icon" href="https://www.shutterstock.com/image-vector/vector-cat-face-minimalist-adorable-600nw-2426797721.jpg" type="image/x-icon">
   
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
      
        <!-- Tailwind Font Config -->
        <script>
          tailwind.config = {
            theme: {
              extend: {
                fontFamily: {
                  sans: ['Poppins', 'sans-serif'],
                }
              }
            }
          }
        </script>
      
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      </head>
      
<body class="min-h-screen flex items-center justify-center bg-gray-900 text-gray-100">

  <div
    class="w-full max-w-md p-8 bg-gray-800 rounded-2xl shadow-2xl border border-gray-700"
    data-aos="fade-up"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
  >
    <h2 class="text-3xl font-bold text-center mb-6 text-white" data-aos="fade-down" data-aos-delay="100">Welcome Back 👋</h2>

    @if (session('success'))
      <p class="mb-4 text-green-400 text-center" data-aos="fade-in" data-aos-delay="200">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
      <p class="mb-4 text-red-400 text-center" data-aos="fade-in" data-aos-delay="200">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-5" data-aos="fade-up" data-aos-delay="300">
      @csrf

      <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input
          type="email"
          name="email"
          class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="you@example.com"
          required
        />
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Password</label>
        <input
          type="password"
          name="password"
          class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="••••••••"
          required
        />
      </div>

      <div>
        <button
          type="submit"
          class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold text-white transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          Sign In
        </button>
      </div>
    </form>

    <p class="mt-6 text-sm text-center text-gray-400" data-aos="fade-up" data-aos-delay="400">
      Don't have an account?
      <a href="{{ route('register') }}" class="text-blue-400 hover:underline">Register</a>
    </p>
  </div>

  <!-- AOS Script -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
