@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <h2 class="card-title h2 mb-4">Bem-vindo ao Meu Projeto Laravel!</h2>
                    <p class="card-text">Use a barra de navegação acima para explorar as funcionalidades do sistema.</p>
                    <hr>
                    <p>Comece gerenciando <a href="{{ route('produtos.index') }}">Produtos</a> e <a href="{{ route('usuarios.index') }}">Usuários</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection