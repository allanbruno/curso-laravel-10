<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    public function run(): void
    {
        Produto::create(
            [
                'nome' => 'Allan Barbosa',
                'valor' => 20.00
            ]
        );
    }
}
