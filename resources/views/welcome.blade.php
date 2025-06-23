{{-- Este é o único conteúdo que deve estar no arquivo welcome.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body p-5 text-center">
                    <h2 class="card-title h2 mb-4">Bem-vindo ao Meu Projeto Laravel!</h2>
                    <p class="card-text">Use a barra de navegação acima para explorar as funcionalidades do sistema.</p>
                    <hr class="my-4">
                    <p>Comece gerenciando <a href="{{ route('produtos.index') }}" class="btn btn-primary">Produtos</a> ou <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Usuários</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection