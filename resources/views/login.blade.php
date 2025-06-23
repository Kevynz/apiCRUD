@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Faça Login</h4>
                </div>
                <div class="card-body">
                    
                    {{-- Exibe erros de login (ex: "Credenciais inválidas") --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Campo de Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>Endereço de E-mail</strong></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        {{-- Campo de Senha --}}
                        <div class="mb-3">
                            <label for="password" class="form-label"><strong>Senha</strong></label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        </div>

                        {{-- Checkbox "Lembrar-me" --}}
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Lembrar-me
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Entrar
                            </button>

                            {{-- Link para Cadastro, caso não tenha uma conta --}}
                            <p class="text-center mt-3">
                                Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection