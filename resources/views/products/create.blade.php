@extends('layouts.loja_info')

@section('content')
<div class="product-form-page">
    <div class="container">
        <div class="product-form-card">

            <h1 class="form-title">Criar Novo Produto</h1>
            <p class="form-subtitle">Preencha os dados abaixo para cadastrar um produto</p>

            <form method="POST" action="{{ route('products.store') }}" id="productForm">
                @csrf

                @if ($errors->any())
                    <div style="background:#fef2f2; border:1px solid #fecaca; color:#b91c1c; padding:1rem; border-radius:8px; margin-bottom:1.5rem;">
                        <strong>Revê os seguintes campos:</strong>
                        <ul style="margin:0.5rem 0 0 1.2rem; list-style:disc;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Nome --}}
                <div class="form-group">
                    <label for="name" class="form-label">Nome do Produto *</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-input @error('name') is-invalid @enderror"
                        placeholder="Ex: Notebook Dell Inspiron 15"
                        required
                    >
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Descrição --}}
                <div class="form-group">
                    <label for="description" class="form-label">Descrição *</label>
                    <textarea
                        id="description"
                        name="description"
                        class="form-textarea @error('description') is-invalid @enderror"
                        placeholder="Descreva o produto..."
                        required
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Preço --}}
                <div class="form-group">
                    <label for="cost" class="form-label">Preço (€) *</label>
                    <input
                        type="number"
                        id="cost"
                        name="cost"
                        value="{{ old('cost') }}"
                        class="form-input @error('cost') is-invalid @enderror"
                        placeholder="0.00"
                        step="0.01"
                        min="0"
                        required
                    >
                    @error('cost')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Categoria --}}
                <div class="form-group">
                    <label for="category_id" class="form-label">Categoria *</label>
                    <select
                        id="category_id"
                        name="category_id"
                        class="form-select @error('category_id') is-invalid @enderror"
                        required
                    >
                        <option value="">Selecione uma categoria</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->Name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Imagem (Cloudinary Widget) --}}
                <div class="form-group">
                    <label class="form-label">Imagem do Produto *</label>

                    <div class="image-upload-box">
                    <!-- Repara no onclick="openUploadWidget()" -->

                        <button type="button" class="btn-upload" id="uploadWidgetBtn">
                            📸 Escolher Imagem
                        </button>

                    <div class="image-preview" id="imagePreview">
                        <img id="previewImg" src="" alt="Preview da Imagem">
                        <br>
                         {{-- 3. Botão para remover a imagem (diferente do primeiro!) --}}
                        <button type="button" class="btn-remove-image" id="removeImageBtn" style="margin-top: 10px; background: #ef4444; color: white; border: none; padding: 0.4rem 0.8rem; border-radius: 6px; cursor: pointer;">
                            Remover Imagem
                        </button>
                    </div>
                </div>

                <input type="hidden" id="img" name="img" value="{{ old('img') }}" required>

                    @error('img')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Botões --}}
                <div class="form-actions">
                    <a href="{{ route('products.index') }}" class="btn-secondary">Cancelar</a>
                    <button type="submit" class="btn-primary">Criar Produto</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // O Laravel injeta o valor do .env diretamente aqui
    const cloudName = "{{ env('CLOUDINARY_CLOUD_NAME') }}";
    const uploadPreset = 'lojainfo_preset';

    // Verificação de segurança
    if (!cloudName || cloudName === '') {
        console.error("ERRO CRÍTICO: O CLOUDINARY_CLOUD_NAME está vazio no .env!");
        alert("Erro de configuração: Verifica se CLOUDINARY_CLOUD_NAME está definido no ficheiro .env");
        return;
    }

    console.log("Widget a inicializar com Cloud Name:", cloudName);

    const myWidget = cloudinary.createUploadWidget({
        cloudName: cloudName,
        uploadPreset: uploadPreset,
        sources: ['local', 'url'],
        multiple: false,
        maxFiles: 1,
        cropping: false,
        showAdvancedOptions: false
    }, function (error, result) {
        if (!error && result && result.event === "success") {
            console.log("Upload bem-sucedido! URL:", result.info.secure_url);

            document.getElementById('img').value = result.info.secure_url;
            document.getElementById('previewImg').src = result.info.secure_url;
            document.getElementById('imagePreview').style.display = 'block';
        }

        if (error) {
            console.error("Erro no upload:", error);
            alert("Erro ao fazer upload: " + error.message);
        }
    });

    const btn = document.getElementById('uploadWidgetBtn');
    if (btn) {
        btn.addEventListener('click', function() {
            console.log("Botão clicado. A abrir widget...");
            myWidget.open();
        });
    }
});
</script>
@endpush
