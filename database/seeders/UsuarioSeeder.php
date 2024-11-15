<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        User::create(
            [
                'name' => 'Allan Barbosa',
                'email' => 'a@gmail.com',
                'password' => Hash::make('123'),
            ]
        );
    }
}
