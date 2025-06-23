<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Api\AuthController;

// Rotas públicas de Autenticação
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas Protegidas (precisam de token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Mova as rotas que precisam de login para dentro deste grupo
    Route::apiResource('produtos', ProdutoController::class);
    Route::apiResource('pedidos', PedidoController::class);
    
    // Aqui também irão as rotas do CRUD de Usuários no futuro
});