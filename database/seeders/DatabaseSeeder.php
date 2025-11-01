<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Membuat user dengan role 'admin'
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'usertype' => 'admin', 
            'password' => Hash::make('password'), 
            'phone' => '081234567890',
            'address' => 'Kantor Pusat, Jakarta',
        ]);

        // Membuat user dengan role 'user' (default)
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            // 'usertype' akan otomatis 'user' karena default
            'password' => Hash::make('password'),
            'phone' => '089876543210',
            'address' => 'Jl. Pahlawan No. 10, Semarang',
        ]);
    }
}
