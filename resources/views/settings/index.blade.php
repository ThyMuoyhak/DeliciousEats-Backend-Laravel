@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Settings</h1>
                <p class="text-gray-400">Manage your account preferences</p>
            </div>
        </div>

        <!-- Notifications -->
        @if (session('success'))
            <div class="bg-emerald-900/50 border-l-4 border-emerald-500 text-emerald-200 p-4 mb-6 rounded-r-lg flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-rose-900/50 border-l-4 border-rose-500 text-rose-200 p-4 mb-6 rounded-r-lg">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-rose-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">Please correct the following errors:</span>
                </div>
                <ul class="mt-2 ml-9 list-disc text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (session('error'))
            <div class="bg-rose-900/50 border-l-4 border-rose-500 text-rose-200 p-4 mb-6 rounded-r-lg flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-rose-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Settings Navigation Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-6">
                    <div class="p-4 border-b border-gray-700/50">
                        <h3 class="text-md font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                            Settings Menu
                        </h3>
                    </div>
                    <div class="p-2">
                        <nav class="space-y-1">
                            <a href="#notifications" class="flex items-center px-3 py-2 text-gray-200 hover:bg-gray-700/50 rounded-lg transition-colors group active">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-cyan-400 group-hover:text-cyan-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                </svg>
                                Notifications
                            </a>
                            <a href="#appearance" class="flex items-center px-3 py-2 text-gray-200 hover:bg-gray-700/50 rounded-lg transition-colors group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-cyan-400 group-hover:text-cyan-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z" clip-rule="evenodd" />
                                </svg>
                                Appearance
                            </a>
                            <a href="#security" class="flex items-center px-3 py-2 text-gray-200 hover:bg-gray-700/50 rounded-lg transition-colors group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-cyan-400 group-hover:text-cyan-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Security
                            </a>
                            <a href="#privacy" class="flex items-center px-3 py-2 text-gray-200 hover:bg-gray-700/50 rounded-lg transition-colors group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-cyan-400 group-hover:text-cyan-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                                    <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                </svg>
                                Privacy
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Account Summary -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
                    <div class="p-4 border-b border-gray-700/50">
                        <h3 class="text-md font-semibold text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            Account Summary
                        </h3>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-white font-bold text-xl">
                                {{ substr(auth()->user()->name ?? 'User', 0, 1) }}
                            </div>
                            <div class="ml-4">
                                <h4 class="text-white font-medium">{{ auth()->user()->name ?? 'User Name' }}</h4>
                                <p class="text-gray-400 text-sm">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                            </div>
                        </div>
                        <div class="pt-3 border-t border-gray-700/50">
                            <a href="#" class="text-cyan-400 hover:text-cyan-300 text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Form -->
            <div class="lg:col-span-2">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Notification Preferences -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-6" id="notifications">
                        <div class="p-6 border-b border-gray-700/50">
                            <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                </svg>
                                Notification Preferences
                            </h2>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-white font-medium">Email Notifications</h3>
                                    <p class="text-gray-400 text-sm mt-1">Receive updates and alerts via email</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="email_notifications" class="sr-only peer" {{ old('email_notifications', $settings->email_notifications ?? true) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-cyan-500/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-600"></div>
                                </label>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-white font-medium">SMS Notifications</h3>
                                    <p class="text-gray-400 text-sm mt-1">Receive updates and alerts via SMS</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="sms_notifications" class="sr-only peer" {{ old('sms_notifications', $settings->sms_notifications ?? true) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-cyan-500/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-600"></div>
                                </label>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-white font-medium">Push Notifications</h3>
                                    <p class="text-gray-400 text-sm mt-1">Receive updates and alerts via push notifications</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="push_notifications" class="sr-only peer" {{ old('push_notifications', $settings->push_notifications ?? true) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-cyan-500/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Appearance Preferences -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden mb-6" id="appearance">
                        <div class="p-6 border-b border-gray-700/50">
                            <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z" clip-rule="evenodd" />
                                </svg>
                                Appearance Preferences
                            </h2>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-white font-medium">Dark Mode</h3>
                                    <p class="text-gray-400 text-sm mt-1">Use dark theme for the application</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="dark_mode" class="sr-only peer" {{ old('dark_mode', $settings->dark_mode ?? false) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-cyan-500/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-600"></div>
                                </label>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-white font-medium">Compact Mode</h3>
                                    <p class="text-gray-400 text-sm mt-1">Use compact layout for denser information display</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="compact_mode" class="sr-only peer" {{ old('compact_mode', $settings->compact_mode ?? false) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-cyan-500/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-600"></div>
                                </label>
                            </div>
                            
                            <div>
                                <h3 class="text-white font-medium mb-2">Color Theme</h3>
                                <p class="text-gray-400 text-sm mb-3">Choose your preferred color theme</p>
                                <div class="grid grid-cols-4 gap-3">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="color_theme" value="cyan" class="sr-only peer" {{ old('color_theme', $settings->color_theme ?? 'cyan') == 'cyan' ? 'checked' : '' }}>
                                        <div class="h-10 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 peer-checked:ring-2 peer-checked:ring-cyan-400 peer-checked:ring-offset-2 peer-checked:ring-offset-gray-900"></div>
                                        <p class="mt-1 text-xs text-center text-gray-400">Cyan</p>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="color_theme" value="purple" class="sr-only peer" {{ old('color_theme', $settings->color_theme ?? 'cyan') == 'purple' ? 'checked' : '' }}>
                                        <div class="h-10 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 peer-checked:ring-2 peer-checked:ring-purple-400 peer-checked:ring-offset-2 peer-checked:ring-offset-gray-900"></div>
                                        <p class="mt-1 text-xs text-center text-gray-400">Purple</p>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="color_theme" value="emerald" class="sr-only peer" {{ old('color_theme', $settings->color_theme ?? 'cyan') == 'emerald' ? 'checked' : '' }}>
                                        <div class="h-10 rounded-lg bg-gradient-to-r from-emerald-500 to-green-500 peer-checked:ring-2 peer-checked:ring-emerald-400 peer-checked:ring-offset-2 peer-checked:ring-offset-gray-900"></div>
                                        <p class="mt-1 text-xs text-center text-gray-400">Emerald</p>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="color_theme" value="amber" class="sr-only peer" {{ old('color_theme', $settings->color_theme ?? 'cyan') == 'amber' ? 'checked' : '' }}>
                                        <div class="h-10 rounded-lg bg-gradient-to-r from-amber-500 to-orange-500 peer-checked:ring-2 peer-checked:ring-amber-400 peer-checked:ring-offset-2 peer-checked:ring-offset-gray-900"></div>
                                        <p class="mt-1 text-xs text-center text-gray-400">Amber</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end mt-8">
                        <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-200 shadow-lg shadow-cyan-900/20 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom scrollbar for webkit browsers */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(31, 41, 55, 0.5);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: rgba(75, 85, 99, 0.5);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: rgba(107, 114, 128, 0.5);
}

/* Smooth transitions */
.transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
}

/* Active navigation item */
.active {
    background-color: rgba(75, 85, 99, 0.5);
    font-weight: 500;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll to sections when clicking on navigation links
    document.querySelectorAll('nav a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links
            document.querySelectorAll('nav a').forEach(a => a.classList.remove('active'));
            
            // Add active class to clicked link
            this.classList.add('active');
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>
@endsection