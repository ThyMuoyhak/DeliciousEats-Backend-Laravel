<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Favicon -->
    <link rel="icon" href="https://www.shutterstock.com/image-vector/vector-cat-face-minimalist-adorable-600nw-2426797721.jpg" type="image/x-icon">
   
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
  
    <!-- Tailwind Config -->
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            fontFamily: {
              sans: ['Poppins', 'sans-serif'],
            },
            colors: {
              'dark-blue': '#1E2A45',
              'midnight': '#121827',
              'accent-blue': '#3B82F6',
              'accent-hover': '#2563EB'
            },
            boxShadow: {
              'glow': '0 0 20px rgba(59, 130, 246, 0.25)'
            }
          }
        }
      }
    </script>
  
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Additional Custom Styles -->
    <style>
      .glass-effect {
        backdrop-filter: blur(10px);
        background: rgba(17, 24, 39, 0.85);
      }
      
      .input-focus:focus {
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
      }
      
      .btn-gradient {
        background: linear-gradient(90deg, #3B82F6 0%, #2563EB 100%);
      }
      
      .float-label {
        top: -25px;
        transition: all 0.2s ease;
      }
    </style>
</head>
  
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-midnight to-dark-blue text-gray-100 p-4">
  <!-- Background particles -->
  <div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div id="particles-js" class="absolute inset-0 opacity-30"></div>
  </div>

  <div
    class="w-full max-w-md p-8 rounded-2xl shadow-2xl glass-effect border border-gray-700 relative overflow-hidden"
    data-aos="fade-up"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
  >
    <!-- Decorative circle -->
    <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-accent-blue opacity-10"></div>
    <div class="absolute -bottom-20 -left-20 w-40 h-40 rounded-full bg-accent-blue opacity-10"></div>
    
    <div class="relative z-10">
      <!-- Logo -->
      <div class="flex justify-center mb-6">
        <div class="w-16 h-16 rounded-full flex items-center justify-center bg-gradient-to-br from-accent-blue to-accent-hover shadow-glow" data-aos="zoom-in" data-aos-delay="200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
        </div>
      </div>
      
      <h2 class="text-3xl font-bold text-center mb-2 text-white" data-aos="fade-down" data-aos-delay="300">Welcome Back</h2>
      <p class="text-center text-gray-400 mb-8" data-aos="fade-down" data-aos-delay="400">Sign in to continue your journey</p>

      @if (session('success'))
        <div class="mb-6 px-4 py-3 rounded-lg bg-green-900/50 border border-green-500" data-aos="fade-in" data-aos-delay="500">
          <p class="text-green-400 text-center text-sm">{{ session('success') }}</p>
        </div>
      @endif

      @if ($errors->any())
        <div class="mb-6 px-4 py-3 rounded-lg bg-red-900/50 border border-red-500" data-aos="fade-in" data-aos-delay="500">
          <p class="text-red-400 text-center text-sm">{{ $errors->first() }}</p>
        </div>
      @endif

      <form action="{{ route('login') }}" method="POST" class="space-y-6" data-aos="fade-up" data-aos-delay="600">
        @csrf

        <div class="relative">
          <label class="block text-sm font-medium mb-1 text-gray-300">Email</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
            </div>
            <input
              type="email"
              name="email"
              class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-800/70 border border-gray-700 placeholder-gray-500 text-gray-100 transition-all input-focus focus:outline-none focus:ring-2 focus:ring-accent-blue"
              placeholder="you@example.com"
              required
            />
          </div>
        </div>

        <div class="relative">
          <label class="block text-sm font-medium mb-1 text-gray-300">Password</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <input
              type="password"
              name="password"
              class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-800/70 border border-gray-700 placeholder-gray-500 text-gray-100 transition-all input-focus focus:outline-none focus:ring-2 focus:ring-accent-blue"
              placeholder="••••••••"
              required
            />
            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-200" id="password-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </button>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-accent-blue focus:ring-accent-blue border-gray-600 rounded bg-gray-700">
            <label for="remember-me" class="ml-2 block text-sm text-gray-400">Remember me</label>
          </div>
          <div class="text-sm">
            <a href="#" class="font-medium text-accent-blue hover:text-accent-hover">Forgot password?</a>
          </div>
        </div>

        <div>
          <button
            type="submit"
            class="w-full py-3 px-4 btn-gradient hover:opacity-90 rounded-lg font-semibold text-white transition-all shadow-glow focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center justify-center"
          >
            <span>Sign In</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </button>
        </div>
      </form>

      <div class="relative flex items-center justify-center mt-8 mb-4">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-gray-700"></div>
        </div>
        <div class="relative px-4 bg-gray-800 text-xs text-gray-500">Or continue with</div>
      </div>

      <div class="grid grid-cols-3 gap-3 mb-6">
        <button class="py-2 px-4 bg-gray-800 hover:bg-gray-700 rounded-lg flex items-center justify-center border border-gray-700 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.087.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.268 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.114 2.504.336 1.909-1.294 2.748-1.026 2.748-1.026.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C17.14 18.163 20 14.418 20 10c0-5.523-4.477-10-10-10z" clip-rule="evenodd"/>
          </svg>
        </button>
        <button class="py-2 px-4 bg-gray-800 hover:bg-gray-700 rounded-lg flex items-center justify-center border border-gray-700 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
            <path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.323-.593 1.323-1.325V1.325C24 .593 23.407 0 22.675 0z"/>
          </svg>
        </button>
        <button class="py-2 px-4 bg-gray-800 hover:bg-gray-700 rounded-lg flex items-center justify-center border border-gray-700 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/>
          </svg>
        </button>
      </div>

      <p class="text-sm text-center text-gray-400" data-aos="fade-up" data-aos-delay="700">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-accent-blue hover:text-accent-hover font-medium">Create account</a>
      </p>
    </div>
  </div>

  <!-- AOS Script -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <!-- Particles.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
  
  <script>
    // Initialize AOS
    AOS.init();
    
    // Password visibility toggle
    document.getElementById('password-toggle').addEventListener('click', function() {
      const passwordInput = document.querySelector('input[name="password"]');
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      
      // Change the icon
      this.innerHTML = type === 'password' 
        ? '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>'
        : '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>';
    });
    
    // Initialize particles.js
    particlesJS('particles-js', {
      "particles": {
        "number": {
          "value": 40,
          "density": {
            "enable": true,
            "value_area": 800
          }
        },
        "color": {
          "value": "#3B82F6"
        },
        "shape": {
          "type": "circle",
          "stroke": {
            "width": 0,
            "color": "#000000"
          }
        },
        "opacity": {
          "value": 0.5,
          "random": true
        },
        "size": {
          "value": 3,
          "random": true
        },
        "line_linked": {
          "enable": true,
          "distance": 150,
          "color": "#3B82F6",
          "opacity": 0.2,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 1,
          "direction": "none",
          "random": true,
          "straight": false,
          "out_mode": "out",
          "bounce": false
        }
      },
      "interactivity": {
        "detect_on": "canvas",
        "events": {
          "onhover": {
            "enable": false
          },
          "onclick": {
            "enable": false
          },
          "resize": true
        }
      },
      "retina_detect": true
    });
  </script>
</body>
</html>