@extends('layouts.loja_info')

@section('content')
    <div class="products-page">
    <div class="container">

        {{-- Cabeçalho da página --}}
        <div class="page-header">
            <h1 class="page-title">Nossos Produtos</h1>
            <p class="page-subtitle">Encontre os melhores equipamentos de informática</p>
        </div>

        <div class="products-layout">

            {{-- Sidebar de Filtros --}}
            <aside class="filters-sidebar">

                <div class="filter-group">
                    <h3 class="filter-title">Categorias</h3>
                    <div class="filter-list">
                        @foreach ($categories as $category)
                            <label class="filter-item">
                                <input type="checkbox" name="category[]" value="{{ $category->id }}">
                                <span>{{ $category->Name }}</span>
                                <span class="filter-count">{{ $category->products->count() }}</span>
                            </label>
                        @endforeach

                    </div>
                </div>

            </aside>

            {{-- Área principal de produtos --}}
            <div class="products-main">

                {{-- Toolbar (resultados + ordenação) --}}
                <div class="products-toolbar">
                    <span class="results-count">Exibindo <strong>{{ $products->count() }}</strong> produtos</span>
                    <select class="sort-select">
                        <option>Ordenar por: Mais relevantes</option>
                        <option>Menor preço</option>
                        <option>Maior preço</option>
                        <option>Mais vendidos</option>
                        <option>Mais recentes</option>
                    </select>
                </div>

                {{-- Grid de produtos --}}
                <div class="products-grid">

                    {{-- Produtos --}}
                    @foreach ($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ $product->img }}" alt="" loading="lazy">
                        </div>
                            <div class="product-info">
                                <span class="product-category">{{ $product->category->Name }}</span>
                                <h3 class="product-name">{{ $product->Name }}</h3>
                                <p class="product-description">{{ $product->Description }}</p>
                                <div class="product-price-container">
                                    <div class="product-price"> € {{ $product->Cost }}</div>
                                </div>
                                <button class="btn-buy">Comprar agora</button>
                            </div>

                    </div>
                    @endforeach

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
