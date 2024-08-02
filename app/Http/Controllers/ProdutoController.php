<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findProdutos = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.produtos.paginacao', compact('findProdutos'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Produto::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }

    public function cadastrarProduto(Request $request)
    {
        if ($request->method() == "POST") {
            dd($request);
        }

        return view('pages.produtos.create');
    }
}
