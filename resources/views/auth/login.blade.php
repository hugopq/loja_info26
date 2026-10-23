@extends('layouts.loja_info')

@section('content')
<div class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            <h1>Bem-vindo de volta!</h1>
        </div>

        {{-- Mensagem de status (ex: email verificado) --}}
        @if (session('status'))
            <div class="auth-alert" style="background:#ecfdf5;border-color:#a7f3d0;color:#065f46;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

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
                    autofocus
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
                    placeholder="••••••••"
                    required
                >
                @error('password')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Lembrar-me + Esqueci senha --}}
            <div class="form-options">
                <label class="form-check">
                    <input type="checkbox" name="remember" id="remember">
                    <span>Lembrar-me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="form-link">
                        Esqueceu a senha?
                    </a>
                @endif
            </div>

            {{-- Botão Entrar --}}
            <button type="submit" class="btn-primary">Entrar</button>
        </form>

        <div class="auth-footer">
            Ainda não tem conta?
            <a href="{{ route('register') }}" class="form-link">Registe-se</a>
        </div>

    </div>
</div>
@endsection
