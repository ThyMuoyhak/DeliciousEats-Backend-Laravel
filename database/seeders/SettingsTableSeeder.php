<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        // Create a default settings record if it doesn't exist
        Setting::firstOrCreate([], [
            'email_notifications' => true,
            'sms_notifications' => true,
            'dark_mode' => false,
        ]);
    }
}
