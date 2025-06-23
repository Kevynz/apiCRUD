@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Detalhes do Produto: {{ $produto->nome }}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>ID:</strong>
                        <p class="text-muted">{{ $produto->id }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Nome:</strong>
                        <p class="text-muted">{{ $produto->nome }}</p>
                    </div>

                    @if($produto->descricao)
                        <div class="mb-3">
                            <strong>Descrição:</strong>
                            <p class="text-muted">{{ $produto->descricao }}</p>
                        </div>
                    @endif

                    <div class="mb-3">
                        <strong>Preço:</strong>
                        <p class="text-muted">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Quantidade em Estoque:</strong>
                        <p class="text-muted">{{ $produto->estoque }} unidades</p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Criado em:</strong>
                            <p class="text-muted">{{ $produto->created_at->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                        <div class="col-sm-6">
                            <strong>Última Atualização:</strong>
                            <p class="text-muted">{{ $produto->updated_at->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light d-flex justify-content-end">
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning me-2">Editar</a>
                    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection