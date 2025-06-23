{{-- O ideal é que este arquivo esteja em resources/views/produtos/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">Adicionar Novo Produto</a>
    </div>

    {{-- 2. Bloco para exibir mensagens de sucesso (como "Produto excluído com sucesso!") --}}
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
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>      {{-- 3. Cabeçalho corrigido --}}
                        <th>Estoque</th>    {{-- 3. Cabeçalho corrigido --}}
                        <th width="250px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td> {{-- 3. Dado corrigido e formatado --}}
                            <td>{{ $produto->estoque }}</td>                            {{-- 3. Dado corrigido --}}
                            <td>
                                <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                {{-- 1. BOTÃO EXCLUIR CORRIGIDO --}}
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
                                      onsubmit="return confirm('Você tem certeza que deseja excluir este produto?');"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        {{-- Mensagem para caso não haja produtos --}}
                        <tr>
                            <td colspan="5" class="text-center">Nenhum produto cadastrado ainda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{-- 4. Links da paginação --}}
            {{ $produtos->links() }}
        </div>
    </div>
</div>
@endsection