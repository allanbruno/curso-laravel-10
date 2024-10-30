<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Seeder;

class VendasSeeder extends Seeder
{
    public function run(): void
    {
        Venda::create(
            [
                'numero_da_venda' => 1,
                'produto_id' => 6,
                'cliente_id' => 3
            ],
            [
                'numero_da_venda' => 2,
                'produto_id' => 8,
                'cliente_id' => 5
            ]
        );
    }
}
