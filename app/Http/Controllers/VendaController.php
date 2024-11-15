<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VendaController extends Controller
{

    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findVendas = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.vendas.paginacao', compact('findVendas'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Venda::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }

    public function cadastrarVenda(FormRequestVenda $request)
    {
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProdutos = Produto::all();
        $findClientes = Cliente::all();

        if ($request->method() == "POST") {
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;

            Venda::create($data);

            toastr()->success('Venda cadastrado com sucesso!');

            return redirect()->route('vendas.index');
        }

        return view(
            'pages.vendas.create',
            compact('findNumeracao', 'findProdutos', 'findClientes')
        );
    }

    public function enviaComprovantePorEmail($id)
    {
        $buscarVenda = Venda::where('id', '=', $id)->first();
        $produtoNome = $buscarVenda->produto->nome;
        $clienteEmail = $buscarVenda->cliente->email;
        $clienteNome = $buscarVenda->cliente->nome;

        $sendMailData = [
            'produtoNome' => $produtoNome,
            'clienteNome' => $clienteNome,
        ];

        Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData));

        toastr()->success('Email enviado com sucesso!');

        return redirect()->route('vendas.index');
    }

}
