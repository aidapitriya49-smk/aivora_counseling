<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator Utama',
            'email' => 'admin@school.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Ibu Guru BK',
            'email' => 'guru@school.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
        ]);
    }
}