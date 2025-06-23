{{-- Herda o layout principal da aplicação --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Usamos um "card" do Bootstrap para um visual mais limpo --}}
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    {{-- Título da página com o nome do produto --}}
                    <h4 class="mb-0">Detalhes do Produto: {{ $produto->nome }}</h4>
                </div>
                <div class="card-body">
                    {{-- Cada informação é exibida como texto, não em inputs --}}
                    <div class="mb-3">
                        <strong>ID:</strong>
                        <p class="text-muted mb-0">{{ $produto->id }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Nome:</strong>
                        <p class="text-muted mb-0">{{ $produto->nome }}</p>
                    </div>

                    {{-- Mostra a descrição apenas se ela não for nula --}}
                    @if($produto->descricao)
                        <div class="mb-3">
                            <strong>Descrição:</strong>
                            <p class="text-muted mb-0">{{ $produto->descricao }}</p>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Preço:</strong>
                            {{-- CORRIGIDO: de 'custo' para 'preco' e formatado como moeda --}}
                            <p class="text-muted mb-0">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Quantidade em Estoque:</strong>
                            {{-- CORRIGIDO: de 'quantidade' para 'estoque' --}}
                            <p class="text-muted mb-0">{{ $produto->estoque }} unidades</p>
                        </div>
                    </div>
                    
                    <hr>

                     <div class="row text-sm text-muted">
                        <div class="col-sm-6">
                            <strong>Criado em:</strong>
                            <p>{{ $produto->created_at->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                        <div class="col-sm-6">
                            <strong>Última Atualização:</strong>
                            <p>{{ $produto->updated_at->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light text-end">
                    {{-- Botões de Navegação --}}
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection