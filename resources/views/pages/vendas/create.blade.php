@extends('index')

@section('content')
    <form method="POST" action="{{ route('cadastrar.venda') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar Venda</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Numeração</label>
            <input
                    type="text"
                    disabled
                    value="{{ $findNumeracao }}"
                    class="form-control @error('numero_da_venda') is-invalid @enderror"
                    name="numero_da_venda"
            >
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-lable">Produto</label>
            <select class="form-select" name="produto_id">
                <option selected>Clique para selecionar</option>
                @foreach($findProdutos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-lable">Cliente</label>
            <select class="form-select" name="cliente_id">
                <option selected>Clique para selecionar</option>
                @foreach($findClientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">CADASTRAR</button>
    </form>
@endsection