@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Usuários</h1>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Adicionar Novo Usuário</a>
    </div>

    {{-- Bloco para exibir mensagens de sucesso ou erro --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
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
                        <th>Email</th>
                        <th width="250px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                {{-- Formulário para o botão Excluir --}}
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                      onsubmit="return confirm('Você tem certeza que deseja excluir este usuário?');"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Nenhum usuário cadastrado ainda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{-- Links da paginação --}}
            {{ $usuarios->links() }}
        </div>
    </div>
</div>
@endsection