@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Registrar Novo Pedido</h4>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>Opa! Verifique os erros abaixo:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pedidos.store') }}" method="POST">
                        @csrf
                        {{-- Campo para selecionar o Cliente (Usuário) --}}
                        <div class="form-group mb-3">
                            <label for="user_id" class="form-label"><strong>Cliente</strong></label>
                            <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                                <option value="" disabled selected>Selecione um cliente</option>
                                {{-- O controller nos envia a lista de todos os usuários --}}
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            {{-- Campo para o Valor Total --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="valor_total" class="form-label"><strong>Valor Total (R$)</strong></label>
                                    <input type="number" name="valor_total" id="valor_total" step="0.01" class="form-control @error('valor_total') is-invalid @enderror" value="{{ old('valor_total') }}" required>
                                    @error('valor_total')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                             {{-- Campo para o Status do Pedido --}}
                            <div class="col-md-6">
                                 <div class="form-group mb-3">
                                    <label for="status" class="form-label"><strong>Status</strong></label>
                                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                        <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                                        <option value="pago" {{ old('status') == 'pago' ? 'selected' : '' }}>Pago</option>
                                        <option value="enviado" {{ old('status') == 'enviado' ? 'selected' : '' }}>Enviado</option>
                                        <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Campo de Detalhes (Opcional) --}}
                        <div class="form-group mb-3">
                            <label for="detalhes" class="form-label"><strong>Detalhes do Pedido</strong> (Opcional)</label>
                            <textarea name="detalhes" id="detalhes" class="form-control @error('detalhes') is-invalid @enderror" rows="4">{{ old('detalhes') }}</textarea>
                            @error('detalhes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Pedido</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection