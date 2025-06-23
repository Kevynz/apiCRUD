@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Histórico de Pedidos</h1>
        {{-- O botão levará a um erro 'pedidos.create not found' até criarmos a próxima tela --}}
        <a href="{{ route('pedidos.create') }}" class="btn btn-primary">Registrar Novo Pedido</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID do Pedido</th>
                        <th>Cliente</th>
                        <th>Valor Total</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th width="180px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pedidos as $pedido)
                        <tr>
                            <td>#{{ $pedido->id }}</td>
                            <td>{{ $pedido->user->name ?? 'Usuário não encontrado' }}</td>
                            <td>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                            <td>
                                @if($pedido->status == 'pago')
                                    <span class="badge bg-success">{{ ucfirst($pedido->status) }}</span>
                                @elseif($pedido->status == 'pendente')
                                    <span class="badge bg-warning text-dark">{{ ucfirst($pedido->status) }}</span>
                                @elseif($pedido->status == 'cancelado')
                                    <span class="badge bg-danger">{{ ucfirst($pedido->status) }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($pedido->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $pedido->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Nenhum pedido encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{-- Links da paginação --}}
            {{ $pedidos->links() }}
        </div>
    </div>
</div>
@endsection