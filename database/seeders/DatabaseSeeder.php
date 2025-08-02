<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder UserSeeder di sini
        $this->call(UserSeeder::class);

        // Jika Anda memiliki seeder lain, tambahkan di sini juga, contoh:
        // $this->call(ProjectSeeder::class);
        // $this->call(CategorySeeder::class);
    }
}