<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
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

    public function cadastrarProduto(FormRequestProduto $request)
    {
        if ($request->method() == "POST") {
            $data = $request->all();
            $components = new Componentes();
            $data['valor'] = $components->formatacaoMascaraDinheiroDecimal($data['valor']);
            Produto::create($data);

            toastr()->success('Produto cadastrado com sucesso!');

            return redirect()->route('produto.index');
        }

        return view('pages.produtos.create');
    }

    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        if ($request->method() == "PUT") {
            $data = $request->all();
            $components = new Componentes();
            $data['valor'] = $components->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($data);

            return redirect()->route('produto.index');
        }

        $findProduto = Produto::where('id', $id)->first();

        return view('pages.produtos.atualiza', compact('findProduto'));
    }
}
