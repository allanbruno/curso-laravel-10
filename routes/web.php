<?php

use App\Http\Controllers\ProdutoController;
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