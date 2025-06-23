<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PedidoController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rota Pública Principal ---
Route::get('/', function () {
    return view('home');
})->name('home');


// --- Rotas de Autenticação para Visitantes (não logados) ---
Route::middleware('guest')->group(function () {
    // Login
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    // Cadastro (Register)
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});


// --- Rotas Protegidas (exigem que o usuário esteja logado) ---
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD de Produtos
    // Esta única linha cria todas as rotas necessárias: index, create, store, show, edit, update, destroy
    Route::resource('produtos', ProdutoController::class);

    // CRUD de Usuários
    // Esta única linha também cria todas as rotas para o CRUD de usuários
    Route::resource('usuarios', UsuarioController::class);

    // CRUD de Pedidos
    Route::resource('pedidos', PedidoController::class);
});