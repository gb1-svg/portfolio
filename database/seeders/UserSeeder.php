<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Penting: import model User
use Illuminate\Support\Facades\Hash; // Penting: untuk mengenkripsi password
use Illuminate\Support\Str; // Opsional: untuk string acak jika diperlukan

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh 1: Membuat satu user admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@portfolio.test',
            'email_verified_at' => now(), // Atau null jika belum diverifikasi
            'password' => Hash::make('admin'), // Pastikan password dienkripsi
            'remember_token' => Str::random(10), // Untuk "remember me" token
        ]);

        // Contoh 2: Membuat beberapa user dummy menggunakan factory
        // Pastikan Anda sudah punya UserFactory jika ingin menggunakan ini
        // Jika belum, buat dengan: php artisan make:factory UserFactory
        User::factory()->count(10)->create();

        // Contoh 3: Membuat user dengan peran tertentu (jika Anda memiliki kolom 'role')
        // if (Schema::hasColumn('users', 'role')) { // Periksa apakah kolom 'role' ada
        //     User::create([
        //         'name' => 'Editor User',
        //         'email' => 'editor@example.com',
        //         'password' => Hash::make('password'),
        //         'role' => 'editor', // Sesuaikan dengan peran Anda
        //     ]);
        // }
    }
}