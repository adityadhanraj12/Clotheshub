<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Aditya',
            'last_name' => 'Dhanraj',
            'email' => 'adityadhanraj404@gmail.com',
            'phone_number' => '0876543210',
            'email_verified_at' => now(),
            'password' => Hash::make('Aditya@123'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'street' => 'Raja Bazar',
            'city' => 'Patna',
            'postal_code' => '800012',
            'state' => 'Bihar',
            'profile_url' => 'img/default.webp',
        ]);
    }
}
