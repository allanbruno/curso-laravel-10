<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');

    Route::get(
        '/cadastrarProduto',
        [ProdutoController::class, 'cadastrarProduto']
    )->name('cadastrar.produto');

    Route::post(
        '/cadastrarProduto',
        [ProdutoController::class, 'cadastrarProduto']
    )->name('cadastrar.produto');

    Route::get(
        '/atualizarProduto/{id}',
        [ProdutoController::class, 'atualizarProduto']
    )->name('atualizar.produto');

    Route::put(
        '/atualizarProduto/{id}', [ProdutoController::class, 'atualizarProduto']
    )->name('atualizar.produto');

    Route::delete('/delete', [ProdutoController::class, 'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');

    Route::get(
        '/cadastrarCliente',
        [ClientesController::class, 'cadastrarCliente']
    )->name('cadastrar.cliente');

    Route::post('/cadastrarCliente',
        [ClientesController::class, 'cadastrarCliente']
    )->name('cadastrar.cliente');

    Route::get(
        '/atualizarCliente/{id}',
        [ClientesController::class, 'atualizarCliente']
    )->name('atualizar.cliente');

    Route::put(
        '/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente']
    )->name('atualizar.cliente');

    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});

Route::prefix('vendas')->group(function () {
    Route::get('/', [VendaController::class, 'index'])->name('vendas.index');

    Route::get('/cadastrarVenda', [VendaController::class, 'cadastrarVenda'])->name('cadastrar.venda');

    Route::post('/cadastrarVenda', [VendaController::class, 'cadastrarVenda'])->name('cadastrar.venda');

    Route::get(
        '/enviaComprovantePorEmail/{id}',
        [VendaController::class, 'enviaComprovantePorEmail']
    )->name('enviaComprovantePorEmail.venda');
});

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');

    Route::get('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');

    Route::post('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');

    Route::get(
        '/atualizarUsuario/{id}', [UsuarioController::class, 'atualizarUsuario']
    )->name('atualizar.usuario');

    Route::put(
        '/atualizarUsuario/{id}', [UsuarioController::class, 'atualizarUsuario']
    )->name('atualizar.usuario');

    Route::delete('/delete', [UsuarioController::class, 'delete'])->name('usuario.delete');
});