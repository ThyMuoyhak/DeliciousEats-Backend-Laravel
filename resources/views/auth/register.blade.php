<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
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
      
      .progress-bar {
        height: 4px;
        width: 0%;
        background: linear-gradient(90deg, #3B82F6 0%, #2563EB 100%);
        transition: width 0.3s ease;
      }
      
      .step-indicator {
        transition: all 0.3s ease;
      }
      
      .step-indicator.active {
        background-color: #3B82F6;
        border-color: #3B82F6;
      }
      
      .step-indicator.completed {
        background-color: #10B981;
        border-color: #10B981;
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
    <!-- Theme Toggle -->
    <button id="theme-toggle" type="button" class="absolute top-4 right-4 z-20 p-2 rounded-lg bg-gray-700/50 hover:bg-gray-600/50 transition-colors">
      <span id="sun-icon" class="hidden dark:inline text-yellow-300 text-lg">☀️</span>
      <span id="moon-icon" class="inline dark:hidden text-gray-300 text-lg">🌙</span>
    </button>
    
    <!-- Decorative circles -->
    <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-accent-blue opacity-10"></div>
    <div class="absolute -bottom-20 -left-20 w-40 h-40 rounded-full bg-accent-blue opacity-10"></div>
    
    <div class="relative z-10">
      <!-- Logo -->
      <div class="flex justify-center mb-6">
        <div class="w-16 h-16 rounded-full flex items-center justify-center bg-gradient-to-br from-accent-blue to-accent-hover shadow-glow" data-aos="zoom-in" data-aos-delay="200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
          </svg>
        </div>
      </div>
      
      <h2 class="text-3xl font-bold text-center mb-2 text-white" data-aos="fade-down" data-aos-delay="300">Create Account</h2>
      <p class="text-center text-gray-400 mb-6" data-aos="fade-down" data-aos-delay="400">Join our community today</p>

      <!-- Progress Bar -->
      <div class="mb-6" data-aos="fade-right" data-aos-delay="500">
        <div class="w-full bg-gray-700 rounded-full h-1">
          <div id="progress-bar" class="progress-bar rounded-full"></div>
        </div>
        <div class="flex justify-between mt-2">
          <div class="flex flex-col items-center">
            <div id="step-1" class="step-indicator w-6 h-6 rounded-full border-2 border-gray-500 flex items-center justify-center active">
              <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <span class="text-xs text-gray-400 mt-1">Account</span>
          </div>
          <div class="flex flex-col items-center">
            <div id="step-2" class="step-indicator w-6 h-6 rounded-full border-2 border-gray-500 flex items-center justify-center">
              <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <span class="text-xs text-gray-400 mt-1">Security</span>
          </div>
          <div class="flex flex-col items-center">
            <div id="step-3" class="step-indicator w-6 h-6 rounded-full border-2 border-gray-500 flex items-center justify-center">
              <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <span class="text-xs text-gray-400 mt-1">Complete</span>
          </div>
        </div>
      </div>

      <div id="error-container" class="mb-6 px-4 py-3 rounded-lg bg-red-900/50 border border-red-500 hidden" data-aos="fade-in" data-aos-delay="500">
        <p id="error-message" class="text-red-400 text-center text-sm"></p>
      </div>

      <form id="register-form" action="/register" method="POST" class="space-y-5" data-aos="fade-up" data-aos-delay="600">
        <!-- CSRF protection -->
        <input type="hidden" name="_token" value="">
        
        <!-- Step 1: Account information -->
        <div id="step1-fields">
          <!-- Full Name -->
          <div class="relative mb-5">
            <label class="block text-sm font-medium mb-1 text-gray-300">Full Name</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              </div>
              <input
                type="text"
                id="name"
                name="name"
                class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-800/70 border border-gray-700 placeholder-gray-500 text-gray-100 transition-all input-focus focus:outline-none focus:ring-2 focus:ring-accent-blue"
                placeholder="Your full name"
                required
              />
            </div>
          </div>
          
          <!-- Email -->
          <div class="relative mb-5">
            <label class="block text-sm font-medium mb-1 text-gray-300">Email Address</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
              </div>
              <input
                type="email"
                id="email"
                name="email"
                class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-800/70 border border-gray-700 placeholder-gray-500 text-gray-100 transition-all input-focus focus:outline-none focus:ring-2 focus:ring-accent-blue"
                placeholder="your@email.com"
                required
              />
            </div>
          </div>
          
          <div class="flex justify-end">
            <button
              type="button"
              id="next-step-1"
              class="px-6 py-3 bg-gradient-to-r from-accent-blue to-accent-hover rounded-lg font-semibold text-white transition-all shadow-glow focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center justify-center"
            >
              <span>Next</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
        </div>
        
        <!-- Step 2: Password information -->
        <div id="step2-fields" class="hidden">
          <!-- Password -->
          <div class="relative mb-5">
            <label class="block text-sm font-medium mb-1 text-gray-300">Password</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
              </div>
              <input
                type="password"
                id="password"
                name="password"
                class="w-full pl-10 pr-10 py-3 rounded-lg bg-gray-800/70 border border-gray-700 placeholder-gray-500 text-gray-100 transition-all input-focus focus:outline-none focus:ring-2 focus:ring-accent-blue"
                placeholder="••••••••"
                required
              />
              <button type="button" class="password-toggle absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </button>
            </div>
            <!-- Password strength indicator -->
            <div class="mt-1">
              <div class="flex justify-between mb-1">
                <span class="text-xs text-gray-400">Password strength:</span>
                <span id="password-strength" class="text-xs text-gray-400">Weak</span>
              </div>
              <div class="w-full bg-gray-700 rounded-full h-1">
                <div id="password-strength-bar" class="h-1 rounded-full bg-red-500" style="width: 10%"></div>
              </div>
            </div>
          </div>
          
          <!-- Confirm Password -->
          <div class="relative mb-5">
            <label class="block text-sm font-medium mb-1 text-gray-300">Confirm Password</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
              </div>
              <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-800/70 border border-gray-700 placeholder-gray-500 text-gray-100 transition-all input-focus focus:outline-none focus:ring-2 focus:ring-accent-blue"
                placeholder="••••••••"
                required
              />
            </div>
          </div>
          
          <div class="flex justify-between">
            <button
              type="button"
              id="prev-step-2"
              class="px-6 py-3 bg-gray-700 hover:bg-gray-600 rounded-lg font-semibold text-white transition-all focus:outline-none focus:ring-2 focus:ring-gray-500 flex items-center justify-center"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
              <span>Back</span>
            </button>
            
            <button
              type="button"
              id="next-step-2"
              class="px-6 py-3 bg-gradient-to-r from-accent-blue to-accent-hover rounded-lg font-semibold text-white transition-all shadow-glow focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center justify-center"
            >
              <span>Next</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
        </div>
        
        <!-- Step 3: Final step -->
        <div id="step3-fields" class="hidden">
          <!-- Terms and conditions -->
          <div class="mb-5">
            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-accent-blue focus:ring-accent-blue border-gray-600 rounded bg-gray-700" required>
              </div>
              <div class="ml-3 text-sm">
                <label for="terms" class="text-gray-300">I agree to the <a href="#" class="text-accent-blue hover:text-accent-hover">Terms of Service</a> and <a href="#" class="text-accent-blue hover:text-accent-hover">Privacy Policy</a></label>
              </div>
            </div>
          </div>
          
          <div class="mb-5">
            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input id="newsletter" name="newsletter" type="checkbox" class="h-4 w-4 text-accent-blue focus:ring-accent-blue border-gray-600 rounded bg-gray-700">
              </div>
              <div class="ml-3 text-sm">
                <label for="newsletter" class="text-gray-300">Subscribe to newsletter to get updates</label>
              </div>
            </div>
          </div>
          
          <div class="flex justify-between">
            <button
              type="button"
              id="prev-step-3"
              class="px-6 py-3 bg-gray-700 hover:bg-gray-600 rounded-lg font-semibold text-white transition-all focus:outline-none focus:ring-2 focus:ring-gray-500 flex items-center justify-center"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
              <span>Back</span>
            </button>
            
            <button
              type="submit"
              class="px-6 py-3 bg-gradient-to-r from-accent-blue to-accent-hover rounded-lg font-semibold text-white transition-all shadow-glow focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center justify-center"
            >
              <span>Create Account</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </button>
          </div>
        </div>
      </form>

      <div class="relative flex items-center justify-center mt-8 mb-4">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-gray-700"></div>
        </div>
        <div class="relative px-4 bg-gray-800 text-xs text-gray-500">Or sign up with</div>
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
        Already have an account?
        <a href="/login" class="text-accent-blue hover:text-accent-hover font-medium">Sign in</a>
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
    
    // Initialize particles.js
    particlesJS("particles-js", {
      particles: {
        number: {
          value: 80,
          density: {
            enable: true,
            value_area: 800
          }
        },
        color: {
          value: "#ffffff"
        },
        shape: {
          type: "circle",
          stroke: {
            width: 0,
            color: "#000000"
          }
        },
        opacity: {
          value: 0.3,
          random: false,
          anim: {
            enable: false
          }
        },
        size: {
          value: 3,
          random: true,
          anim: {
            enable: false
          }
        },
        line_linked: {
          enable: true,
          distance: 150,
          color: "#ffffff",
          opacity: 0.2,
          width: 1
        },
        move: {
          enable: true,
          speed: 1,
          direction: "none",
          random: false,
          straight: false,
          out_mode: "out",
          bounce: false,
          attract: {
            enable: false,
            rotateX: 600,
            rotateY: 1200
          }
        }
      },
      interactivity: {
        detect_on: "canvas",
        events: {
          onhover: {
            enable: true,
            mode: "grab"
          },
          onclick: {
            enable: true,
            mode: "push"
          },
          resize: true
        },
        modes: {
          grab: {
            distance: 140,
            line_linked: {
              opacity: 0.5
            }
          },
          push: {},
          push: {
            particles_nb: 4
          }
        }
      },
      retina_detect: true
    });
    
    // Password toggle visibility
    document.querySelectorAll('.password-toggle').forEach(function(toggle) {
      toggle.addEventListener('click', function() {
        const passwordInput = this.previousElementSibling;
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Change the icon
        if (type === 'password') {
          this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>';
        } else {
          this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>';
        }
      });
    });
    
    // Theme toggle functionality
    const themeToggleBtn = document.getElementById('theme-toggle');
    const htmlElement = document.documentElement;
    
    themeToggleBtn.addEventListener('click', function() {
      if (htmlElement.classList.contains('dark')) {
        htmlElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      } else {
        htmlElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      }
    });
    
    // Check for saved theme preference or use system preference
    if (localStorage.getItem('theme') === 'light' || 
      (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: light)').matches)) {
      htmlElement.classList.remove('dark');
    } else {
      htmlElement.classList.add('dark');
    }
    
    // Multi-step form functionality
    const step1Fields = document.getElementById('step1-fields');
    const step2Fields = document.getElementById('step2-fields');
    const step3Fields = document.getElementById('step3-fields');
    const nextStep1Button = document.getElementById('next-step-1');
    const nextStep2Button = document.getElementById('next-step-2');
    const prevStep2Button = document.getElementById('prev-step-2');
    const prevStep3Button = document.getElementById('prev-step-3');
    const progressBar = document.getElementById('progress-bar');
    const stepIndicator1 = document.getElementById('step-1');
    const stepIndicator2 = document.getElementById('step-2');
    const stepIndicator3 = document.getElementById('step-3');
    const errorContainer = document.getElementById('error-container');
    const errorMessage = document.getElementById('error-message');
    
    // Step 1 validation
    nextStep1Button.addEventListener('click', function() {
      const nameInput = document.getElementById('name');
      const emailInput = document.getElementById('email');
      
      let isValid = true;
      
      // Basic validation
      if (nameInput.value.trim() === '') {
        showError('Please enter your name');
        isValid = false;
      } else if (emailInput.value.trim() === '') {
        showError('Please enter your email address');
        isValid = false;
      } else if (!isValidEmail(emailInput.value)) {
        showError('Please enter a valid email address');
        isValid = false;
      } else {
        hideError();
      }
      
      if (isValid) {
        // Move to step 2
        step1Fields.classList.add('hidden');
        step2Fields.classList.remove('hidden');
        
        // Update progress
        progressBar.style.width = '50%';
        stepIndicator1.classList.add('completed');
        stepIndicator2.classList.add('active');
        
        // Add animation
        AOS.refresh();
      }
    });
    
    // Step 2 validation
    nextStep2Button.addEventListener('click', function() {
      const passwordInput = document.getElementById('password');
      const confirmPasswordInput = document.getElementById('password_confirmation');
      
      let isValid = true;
      
      // Basic validation
      if (passwordInput.value.trim() === '') {
        showError('Please enter a password');
        isValid = false;
      } else if (passwordInput.value.length < 8) {
        showError('Password must be at least 8 characters long');
        isValid = false;
      } else if (passwordInput.value !== confirmPasswordInput.value) {
        showError('Passwords do not match');
        isValid = false;
      } else {
        hideError();
      }
      
      if (isValid) {
        // Move to step 3
        step2Fields.classList.add('hidden');
        step3Fields.classList.remove('hidden');
        
        // Update progress
        progressBar.style.width = '100%';
        stepIndicator2.classList.add('completed');
        stepIndicator3.classList.add('active');
        
        // Add animation
        AOS.refresh();
      }
    });
    
    // Go back to step 1
    prevStep2Button.addEventListener('click', function() {
      step2Fields.classList.add('hidden');
      step1Fields.classList.remove('hidden');
      
      // Update progress
      progressBar.style.width = '0%';
      stepIndicator2.classList.remove('active');
      stepIndicator1.classList.remove('completed');
      
      // Add animation
      AOS.refresh();
    });
    
    // Go back to step 2
    prevStep3Button.addEventListener('click', function() {
      step3Fields.classList.add('hidden');
      step2Fields.classList.remove('hidden');
      
      // Update progress
      progressBar.style.width = '50%';
      stepIndicator3.classList.remove('active');
      stepIndicator2.classList.remove('completed');
      
      // Add animation
      AOS.refresh();
    });
    
    // Password strength meter
    const passwordInput = document.getElementById('password');
    const strengthBar = document.getElementById('password-strength-bar');
    const strengthText = document.getElementById('password-strength');
    
    passwordInput.addEventListener('input', function() {
      const password = this.value;
      const strength = calculatePasswordStrength(password);
      
      // Update strength bar
      strengthBar.style.width = strength.percent + '%';
      strengthText.textContent = strength.label;
      
      // Update color based on strength
      if (strength.percent <= 25) {
        strengthBar.className = 'h-1 rounded-full bg-red-500';
      } else if (strength.percent <= 50) {
        strengthBar.className = 'h-1 rounded-full bg-orange-500';
      } else if (strength.percent <= 75) {
        strengthBar.className = 'h-1 rounded-full bg-yellow-500';
      } else {
        strengthBar.className = 'h-1 rounded-full bg-green-500';
      }
    });
    
    // Calculate password strength
    function calculatePasswordStrength(password) {
      let strength = 0;
      
      // Length check
      if (password.length >= 8) strength += 25;
      if (password.length >= 12) strength += 15;
      
      // Character variety checks
      if (/[A-Z]/.test(password)) strength += 15; // Has uppercase
      if (/[a-z]/.test(password)) strength += 10; // Has lowercase
      if (/[0-9]/.test(password)) strength += 15; // Has number
      if (/[^A-Za-z0-9]/.test(password)) strength += 20; // Has special char
      
      // Determine label
      let label = 'Weak';
      if (strength > 25) label = 'Fair';
      if (strength > 50) label = 'Good';
      if (strength > 75) label = 'Strong';
      
      // Cap at 100%
      strength = Math.min(strength, 100);
      
      return {
        percent: strength,
        label: label
      };
    }
    
    // Form submission
    const form = document.getElementById('register-form');
    
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Final validation check
      const termsCheckbox = document.getElementById('terms');
      if (!termsCheckbox.checked) {
        showError('You must agree to the Terms of Service and Privacy Policy');
        return;
      }
      
      // Show loading state
      const submitButton = form.querySelector('button[type="submit"]');
      const originalButtonText = submitButton.innerHTML;
      submitButton.innerHTML = '<svg class="animate-spin h-5 w-5 text-white mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Processing...';
      submitButton.disabled = true;
      
      // Simulate form submission (replace with actual submission)
      setTimeout(function() {
        // Reset the button
        submitButton.innerHTML = originalButtonText;
        submitButton.disabled = false;
        
        // Redirect or show success message
        window.location.href = '/dashboard'; // Replace with your success page
        
        // Or show success message:
        // showSuccess('Account created successfully! Redirecting...');
        // setTimeout(() => window.location.href = '/dashboard', 2000);
      }, 1500);
    });
    
    // Helper functions
    function isValidEmail(email) {
      const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }
    
    function showError(message) {
      errorContainer.classList.remove('hidden');
      errorMessage.textContent = message;
    }
    
    function hideError() {
      errorContainer.classList.add('hidden');
      errorMessage.textContent = '';
    }
    
    function showSuccess(message) {
      errorContainer.classList.remove('hidden');
      errorContainer.classList.remove('bg-red-900/50');
      errorContainer.classList.remove('border-red-500');
      errorContainer.classList.add('bg-green-900/50');
      errorContainer.classList.add('border-green-500');
      errorMessage.classList.remove('text-red-400');
      errorMessage.classList.add('text-green-400');
      errorMessage.textContent = message;
    }
  </script>
</body>
</html>