<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::create(
            [
                'nome' => 'Allan Barbosa',
                'email' => 'a@gmail.com',
                'endereco' => 'Rua x',
                'logradouro' => 'Rua x',
                'cep' => '88135100',
                'bairro' => 'Jardim X',
            ]
        );
    }
}
