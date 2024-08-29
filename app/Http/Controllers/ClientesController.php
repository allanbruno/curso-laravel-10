<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Componentes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Cliente::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }

    public function cadastrarCliente(Request $request)
    {
        if ($request->method() == "POST") {
            $data = $request->all();
            $components = new Componentes();
            $data['valor'] = $components->formatacaoMascaraDinheiroDecimal($data['valor']);
            Cliente::create($data);

            toastr()->success('Cliente cadastrado com sucesso!');

            return redirect()->route('cliente.index');
        }

        return view('pages.clientes.create');
    }

    public function atualizarCliente(Request $request, $id)
    {
        if ($request->method() == "PUT") {
            $data = $request->all();
            $components = new Componentes();
            $data['valor'] = $components->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);

            toastr()->success('Cliente atualizado com sucesso!');

            return redirect()->route('cliente.index');
        }

        $findCliente = Cliente::where('id', $id)->first();

        return view('pages.clientes.atualiza', compact('findCliente'));
    }
}
