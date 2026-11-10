<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gogo.com'],
            [
                'name' => 'usertester',
                'password' => Hash::make('password123'),
                'role'     => 'admin',
            ]
        );
        User::updateOrCreate(
            ['email' => 'petugas@gogo.com'],
            [
                'name'     => 'Petugas Perpustakaan',
                'password' => Hash::make('password123'),
                'role'     => 'petugas',
            ]
        );
    }
}
