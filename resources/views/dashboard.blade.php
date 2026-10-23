@extends('layouts.loja_info')

@section('content')
<div class="dashboard">
    <div class="container">

        {{-- Cabeçalho do Dashboard --}}
        <div class="dashboard-header">
            <h1>Olá, {{ Auth::user()->name }}! 👋</h1>
            <p>Bem-vindo ao seu painel de controle. Aqui você pode gerenciar seus pedidos e conta.</p>
        </div>

        {{-- Estatísticas --}}
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📦</div>
                <div class="stat-value">3</div>
                <div class="stat-label">Pedidos Ativos</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">✅</div>
                <div class="stat-value">12</div>
                <div class="stat-label">Pedidos Concluídos</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">❤️</div>
                <div class="stat-value">8</div>
                <div class="stat-label">Favoritos</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">💰</div>
                <div class="stat-value">R$ 2.450</div>
                <div class="stat-label">Total Gasto</div>
            </div>
        </div>

        {{-- Pedidos Recentes --}}
        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">Pedidos Recentes</h2>
                <a href="#" class="section-link">Ver todos →</a>
            </div>

            <div class="orders-list">
                <div class="order-item">
                    <div class="order-info">
                        <div class="order-number">#PED-2024-001</div>
                        <div class="order-date">Notebook Dell Inspiron 15</div>
                        <div class="order-date">15 de Outubro, 2024</div>
                    </div>
                    <span class="order-status status-shipped">Enviado</span>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-number">#PED-2024-002</div>
                        <div class="order-date">Mouse Logitech MX Master 3</div>
                        <div class="order-date">12 de Outubro, 2024</div>
                    </div>
                    <span class="order-status status-delivered">Entregue</span>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-number">#PED-2024-003</div>
                        <div class="order-date">Teclado Mecânico Redragon</div>
                        <div class="order-date">10 de Outubro, 2024</div>
                    </div>
                    <span class="order-status status-pending">Pendente</span>
                </div>
            </div>
        </div>

        {{-- Links Rápidos --}}
        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">Ações Rápidas</h2>
            </div>

            <div class="quick-links">
                <a href="#" class="quick-link">
                    <span class="quick-link-icon">📦</span>
                    <span class="quick-link-text">Meus Pedidos</span>
                </a>

                <a href="#" class="quick-link">
                    <span class="quick-link-icon">❤️</span>
                    <span class="quick-link-text">Favoritos</span>
                </a>

                <a href="#" class="quick-link">
                    <span class="quick-link-icon">👤</span>
                    <span class="quick-link-text">Meu Perfil</span>
                </a>

                <a href="#" class="quick-link">
                    <span class="quick-link-icon">📍</span>
                    <span class="quick-link-text">Endereços</span>
                </a>

                <a href="#" class="quick-link">
                    <span class="quick-link-icon">💳</span>
                    <span class="quick-link-text">Pagamentos</span>
                </a>

                <a href="#" class="quick-link">
                    <span class="quick-link-icon">🔔</span>
                    <span class="quick-link-text">Notificações</span>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
