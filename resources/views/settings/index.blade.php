@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8" data-aos="fade-up" data-aos-duration="1000">Settings</h1>

    <!-- Settings Form -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1200">
        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Notification Preferences -->
            <div class="mb-6" data-aos="fade-up" data-aos-duration="1300">
                <h2 class="text-xl font-semibold mb-4">Notification Preferences</h2>
                <div class="space-y-4">
                    <!-- Email Notifications -->
                    <div class="flex items-center" data-aos="fade-up" data-aos-duration="1400">
                        <input type="checkbox" name="email_notifications" id="email_notifications" class="form-checkbox h-5 w-5 text-blue-500" {{ old('email_notifications', $settings->email_notifications ?? true) ? 'checked' : '' }}>
                        <label for="email_notifications" class="ml-2 text-gray-300">Enable Email Notifications</label>
                    </div>
                    <!-- SMS Notifications -->
                    <div class="flex items-center" data-aos="fade-up" data-aos-duration="1500">
                        <input type="checkbox" name="sms_notifications" id="sms_notifications" class="form-checkbox h-5 w-5 text-blue-500" {{ old('sms_notifications', $settings->sms_notifications ?? true) ? 'checked' : '' }}>
                        <label for="sms_notifications" class="ml-2 text-gray-300">Enable SMS Notifications</label>
                    </div>
                </div>
            </div>

            <!-- Theme Preferences -->
            <div class="mb-6" data-aos="fade-up" data-aos-duration="1600">
                <h2 class="text-xl font-semibold mb-4">Theme Preferences</h2>
                <div class="space-y-4">
                    <!-- Dark Mode -->
                    <div class="flex items-center" data-aos="fade-up" data-aos-duration="1700">
                        <input type="checkbox" name="dark_mode" id="dark_mode" class="form-checkbox h-5 w-5 text-blue-500" {{ old('dark_mode', $settings->dark_mode ?? false) ? 'checked' : '' }}>
                        <label for="dark_mode" class="ml-2 text-gray-300">Enable Dark Mode</label>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="mt-6" data-aos="fade-up" data-aos-duration="1800">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
@endsection
