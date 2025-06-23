@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg rounded-lg">
        <h3 class="text-2xl font-bold text-center">Cadastre-se</h3>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="name">Nome</label>
                    <input type="text" name="name" placeholder="Seu Nome"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="mt-4">
                    <label class="block" for="email">Email</label>
                    <input type="email" name="email" placeholder="Seu Email"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="mt-4">
                    <label class="block" for="password">Senha</label>
                    <input type="password" name="password" placeholder="Sua Senha"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="mt-4">
                    <label class="block" for="password_confirmation">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" placeholder="Confirme sua Senha"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="flex items-baseline justify-end">
                    <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 