<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;

class DashboardController extends Controller
{

    public function index()
    {
        $totalDeProdutosCadastrado = $this->buscaProdutoCadastrado();
        $totalDeClientesCadastrado = $this->buscaClienteCadastrado();
        $totalDeVendasCadastrado = $this->buscaVendaCadastrado();
        $totalDeUsuariosCadastrado = $this->buscaUsuarioCadastrado();

        return view(
            'pages.dashboard.dashboard',
            compact(
                'totalDeProdutosCadastrado',
                'totalDeClientesCadastrado',
                'totalDeVendasCadastrado',
                'totalDeUsuariosCadastrado'
            )
        );
    }

    public function buscaProdutoCadastrado()
    {
        $produtos = Produto::all()->count();

        return $produtos;
    }

    public function buscaClienteCadastrado()
    {
        $produtos = Cliente::all()->count();

        return $produtos;
    }

    public function buscaVendaCadastrado()
    {
        $produtos = Venda::all()->count();

        return $produtos;
    }

    public function buscaUsuarioCadastrado()
    {
        $usuario = User::all()->count();

        return $usuario;
    }

}
