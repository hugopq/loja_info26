<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loja Info</title>
    <link rel="stylesheet" href="/css/app.css">
    <!-- Cloudinary Upload Widget -->
<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
</head>
<body>
     {{-- CABEÇALHO --}}
    <header class="header">
        <div class="container header-container">

            <a href="{{ url('/') }}" class="logo">
                <span class="logo-icon">💻</span>
                <span class="logo-text">Loja<span class="logo-highlight">Info</span></span>
            </a>

            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="{{ route('products.index') }}" class="nav-link">Ver Produtos</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="nav-link">Painel de Controlo</a></li>
                    @endauth
                </ul>
            </nav>

            <div class="header-actions">
                {{-- Se NÃO está autenticado --}}
                @guest
                    <a href="{{ route('login') }}" class="btn-login">
                        <span class="btn-icon">👤</span>
                        <span>Entrar</span>
                    </a>
                @endguest
                {{-- Se ESTÁ autenticado --}}
                @auth
                    <div class="user-info">
                        <span class="user-name"> 👤 {{ Auth::user()->name }}</span>
                    </div>

                    <a href="{{ url('/minhas-compras') }}" class="icon-btn" title="As minhas compras">
                        📦 <span class="cart-badge">{{ Auth::user()->orders_count ?? 0 }}</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="icon-btn" title="Sair">
                            🚪
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    {{-- CONTEÚDO PRINCIPAL --}}
    <main class="main">
        @yield('content')
    </main>

    {{-- RODAPÉ --}}
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">

                <div class="footer-col">
                    <h3 class="footer-title">💻 Loja Info</h3>
                    <p class="footer-text">
                        Sua loja de informática completa. Computadores, notebooks,
                        periféricos e assistência técnica com os melhores preços.
                    </p>
                </div>

                <div class="footer-col">
                    <h4 class="footer-title">Contato</h4>
                    <ul class="footer-contact">
                        <li>📍 Rua da Tecnologia, 123</li>
                        <li>📞 (291) 666999</li>
                        <li>✉️ contato@lojainfo.pt</li>
                        <li>🕐 Seg-Sex: 9h às 18h</li>
                    </ul>
                </div>

            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} TechStore - Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
    @stack('scripts')
</body>
</html>
