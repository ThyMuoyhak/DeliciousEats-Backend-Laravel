<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Insert user: ThyMuoyhak
        DB::table('users')->insert([
            'name' => 'ThyMuoyhak',
            'email' => 'thymuoyhak@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('089643959'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Password Reset Token
        DB::table('password_reset_tokens')->insert([
            'email' => 'thymuoyhak@gmail.com',
            'token' => Str::random(60),
            'created_at' => now(),
        ]);

        // Session
        DB::table('sessions')->insert([
            'id' => Str::uuid()->toString(),
            'user_id' => 1, // assuming this is the first user
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            'payload' => 'sample_payload_data',
            'last_activity' => now()->timestamp,
        ]);
    }
}
