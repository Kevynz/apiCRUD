<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;



// Rota para a página inicial (Home)
Route::get('/', function () {
    return view('home'); // 'home' é o nome da view da página inicial
})->name('home');







// Rota para a página de login
Route::get('/login', function () {
    return view('login'); // 'login' é o nome da view de login
})->name('login'); // Define o nome da rota como 'login'

// Rota para a página de cadastro
Route::get('/register', function () {
    return view('register'); // 'cadastro' é o nome da view de cadastro
})->name('register'); // Define o nome da rota como 'cadastro'


// Rotas para produto

Route::get('/produtos/novo', [ProdutoController::class, 'create']);
Route::resource('produtos', ProdutoController::class);

Route::post('/produtos/novo', [ProdutoController::class, 'store'])->name('registrar_produto');
Route::get('/produtos/ver/{id}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::get('/produtos/ver/{id}', [ProdutoController::class, 'show'])->name('produtos.ver');

Route::get('/produtos/editar/{id}', [ProdutoController::class, 'edit']);
Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::get('/produtos/delete/{id}', [ProdutoController::class, 'delete'])->name('produtos.delete');
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

// Rotas para login


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Rotas para login

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);


Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Rotas para Usuários
Route::get('/usuarios/novo', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::resource('usuarios', UsuarioController::class);
Route::post('/usuarios/novo', [UsuarioController::class, 'store'])->name('registrar_usuario');
Route::get('/usuarios/ver/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/editar/{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::get('/usuarios/delete/{id}', [UsuarioController::class, 'delete'])->name('usuarios.delete');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
