@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-4">Bem-vindo ao Meu Projeto Laravel!</h2>
                <p class="mb-4">teste as funcionalidades.</p>
                <p>Aqui você pode gerenciar <a href="/produtos" class="text-blue-500 hover:underline">Produtos</a> e <a href="/usuarios" class="text-blue-500 hover:underline">Usuários</a>.</p>
            </div>
        </div>
    </div>
</div>
@endsection