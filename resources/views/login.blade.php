@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg rounded-lg">
        <h3 class="text-2xl font-bold text-center">Faça Login</h3>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="email">Email</label>
                    <input type="email" name="email" placeholder="Seu Email"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="mt-4">
                    <label class="block" for="password">Senha</label>
                    <input type="password" name="password" placeholder="Sua Senha"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="flex items-baseline justify-between">
                    <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Entrar</button>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Esqueceu a senha?</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection