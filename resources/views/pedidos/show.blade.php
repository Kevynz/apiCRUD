@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Detalhes do Pedido #{{ $pedido->id }}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Cliente:</strong>
                        <p class="text-muted mb-0">{{ $pedido->user->name ?? 'Usuário não encontrado' }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Email do Cliente:</strong>
                        <p class="text-muted mb-0">{{ $pedido->user->email ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Status do Pedido:</strong>
                        <p class="mb-0">
                            @if($pedido->status == 'pago')
                                <span class="badge bg-success fs-6">{{ ucfirst($pedido->status) }}</span>
                            @elseif($pedido->status == 'pendente')
                                <span class="badge bg-warning text-dark fs-6">{{ ucfirst($pedido->status) }}</span>
                            @elseif($pedido->status == 'cancelado')
                                <span class="badge bg-danger fs-6">{{ ucfirst($pedido->status) }}</span>
                            @else
                                <span class="badge bg-secondary fs-6">{{ ucfirst($pedido->status) }}</span>
                            @endif
                        </p>
                    </div>
                    <div class="mb-3">
                        <strong>Valor Total:</strong>
                        <p class="text-muted mb-0 fs-5">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</p>
                    </div>

                    {{-- Mostra a descrição apenas se ela existir --}}
                    @if($pedido->detalhes)
                        <div class="mb-3">
                            <strong>Detalhes Adicionais:</strong>
                            <div class="card bg-light">
                                <div class="card-body">
                                    {{ $pedido->detalhes }}
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <hr>

                     <div class="row text-sm text-muted">
                        <div class="col-sm-6">
                            <strong>Pedido Criado em:</strong>
                            <p>{{ $pedido->created_at->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                        <div class="col-sm-6">
                            <strong>Última Atualização:</strong>
                            <p>{{ $pedido->updated_at->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light d-flex justify-content-end">
                    <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning me-2">Editar Pedido</a>
                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection