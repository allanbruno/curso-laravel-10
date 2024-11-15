<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findUsuario = $this->user->getUsuariosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.usuario.paginacao', compact('findUsuario'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = User::find($id);
        $buscarRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarUsuario(UsuarioFormRequest $request)
    {
        if ($request->method() == "POST") {
            $data = $request->all();
            User::create($data);

            toastr()->success('Usuário cadastrado com sucesso!');

            return redirect()->route('usuario.index');
        }

        return view('pages.usuario.create');
    }

    public function atualizarUsuario(UsuarioFormRequest $request, $id)
    {
        if ($request->method() == "PUT") {
            $data = $request->all();

            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);

            toastr()->success('Usuário alterado com sucesso!');

            return redirect()->route('usuario.index');
        }

        $findUsuario = User::where('id', $id)->first();

        return view('pages.usuario.atualiza', compact('findUsuario'));
    }
}
