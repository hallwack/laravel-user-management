<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password123'),
        ])->hobbies()->createMany([
            ['name' => 'Coding'],
            ['name' => 'Membaca'],
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@mail.com',
            'password' => Hash::make('rahasia123'),
        ])->hobbies()->createMany([
            ['name' => 'Sepak Bola'],
            ['name' => 'Memasak'],
        ]);
    }
}
