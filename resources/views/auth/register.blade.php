@extends('layouts.loja_info')

@section('content')
<div class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            <h1>Criar sua conta</h1>
            <p>Preencha os dados abaixo para se cadastrar</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            {{-- Nome --}}
            <div class="form-group">
                <label for="name" class="form-label">Nome completo</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    class="form-input @error('name') is-invalid @enderror"
                    placeholder="João Silva"
                    required
                    autofocus
                >
                @error('name')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email" class="form-label">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-input @error('email') is-invalid @enderror"
                    placeholder="seu@email.com"
                    required
                >
                @error('email')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Senha --}}
            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-input @error('password') is-invalid @enderror"
                    placeholder="Mínimo 8 caracteres"
                    required
                >
                @error('password')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Confirmar Senha --}}
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmar senha</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="form-input"
                    placeholder="Repita a senha"
                    required
                >
            </div>

            {{-- Botão Cadastrar --}}
            <button type="submit" class="btn-primary">Criar conta</button>
        </form>

        <div class="auth-footer">
            Já tem uma conta?
            <a href="{{ route('login') }}" class="form-link">Faça login</a>
        </div>

    </div>
</div>
@endsection
