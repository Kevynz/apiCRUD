@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Cadastrar Novo Usuário</h4>
                </div>
                <div class="card-body">

                    {{-- Exibe um resumo de todos os erros de validação, se houver --}}
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <h5 class="alert-heading">Opa! Algo deu errado.</h5>
                            <p>Por favor, verifique os campos abaixo:</p>
                        </div>
                    @endif

                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label"><strong>Nome Completo</strong></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label"><strong>Endereço de E-mail</strong></label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                             @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label"><strong>Senha</strong></label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                                     @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="form-label"><strong>Confirmar Senha</strong></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection