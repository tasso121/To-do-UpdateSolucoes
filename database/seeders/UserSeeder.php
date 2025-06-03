<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'teste1',
            'email' => 'teste1@exemplo.com',
            'password' => Hash::make('senha123'),
        ]);

        User::create([
            'name' => 'teste2',
            'email' => 'teste2@exemplo.com',
            'password' => Hash::make('senha123'),
        ]);
    }
}
