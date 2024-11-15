@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produtos Cadastrados</h5>
                    <p class="card-text">Total de produtos cadastrados</p>
                    <a href="#" class="btn btn-primary">{{ $totalDeProdutosCadastrado }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clientes Cadastrados</h5>
                    <p class="card-text">Total de clientes cadastrados</p>
                    <a href="#" class="btn btn-primary">{{ $totalDeClientesCadastrado }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vendas Cadastradas</h5>
                    <p class="card-text">Total de vendas cadastradas</p>
                    <a href="#" class="btn btn-primary">{{ $totalDeVendasCadastrado }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuários Cadastrados</h5>
                    <p class="card-text">Total de usuários cadastrados</p>
                    <a href="#" class="btn btn-primary">{{ $totalDeUsuariosCadastrado }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection