<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Display the settings page
    public function index()
    {
        // Fetch the first settings record or create a default one
        $settings = Setting::firstOrCreate([], [
            'email_notifications' => true,
            'sms_notifications' => true,
            'dark_mode' => false,
        ]);

        return view('settings.index', compact('settings'));
    }

    // Handle form submission
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'email_notifications' => 'nullable|boolean',
            'sms_notifications' => 'nullable|boolean',
            'dark_mode' => 'nullable|boolean',
        ]);

        // Fetch the first settings record or create a default one
        $settings = Setting::firstOrCreate([], [
            'email_notifications' => true,
            'sms_notifications' => true,
            'dark_mode' => false,
        ]);

        // Update the settings
        $settings->update([
            'email_notifications' => $request->input('email_notifications', false),
            'sms_notifications' => $request->input('sms_notifications', false),
            'dark_mode' => $request->input('dark_mode', false),
        ]);

        // Redirect back with a success message
        return redirect()->route('settings.index')->with('success', 'Settings updated successfully!');
    }
}