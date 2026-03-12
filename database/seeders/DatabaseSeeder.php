<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // WAJIB ADA supaya tidak merah

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator Utama',
            'email' => 'admin@school.com',
            'password' => Hash::make('password123'), // Password yang akan kamu ketik nanti
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Ibu Guru BK',
            'email' => 'guru@school.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru', // Pastikan role-nya 'guru' sesuai pengecekan di controller
        ]);
    }
}