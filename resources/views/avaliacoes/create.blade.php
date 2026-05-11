@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h1 class="section-heading">
            <i class="bi bi-star"></i> Nova Avaliação
        </h1>
        <p class="section-sub">Registre uma avaliação de livro</p>
    </div>
</div>

@if($errors->any())
    <div class="lib-alert lib-alert-danger mb-4">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <div>
            @foreach($errors->all() as $erro)
                <div>{{ $erro }}</div>
            @endforeach
        </div>
    </div>
@endif

<div class="lib-card" style="max-width:650px;">
    <div class="lib-card-header">
        <span class="lib-card-title">Dados da Avaliação</span>
    </div>

    <div class="p-4">

        <form action="{{ route('avaliacoes.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="lib-label">Livro</label>
                <select name="livro_id" class="lib-input" required>
                    <option value="">— Selecione —</option>
                    @foreach($livros as $livro)
                        <option value="{{ $livro->id }}" {{ old('livro_id') == $livro->id ? 'selected' : '' }}>
                            {{ $livro->titulo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="lib-label">Nota (1 a 5)</label>
                <input type="number" name="nota" class="lib-input" min="1" max="5" value="{{ old('nota') }}" required>
            </div>

            <div class="mb-4">
                <label class="lib-label">Título</label>
                <input type="text" name="titulo" class="lib-input" value="{{ old('titulo') }}" placeholder="Resumo da avaliação" required>
            </div>

            <div class="mb-4">
                <label class="lib-label">Comentário</label>
                <textarea name="comentario" class="lib-input" rows="4" required>{{ old('comentario') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="lib-label">Recomendado</label>
                <select name="recomendado" class="lib-input" required>
                    <option value="">— Selecione —</option>
                    <option value="1" {{ old('recomendado') === '1' ? 'selected' : '' }}>Sim</option>
                    <option value="0" {{ old('recomendado') === '0' ? 'selected' : '' }}>Não</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="lib-label">Origem</label>
                <select name="origem" class="lib-input" required>
                    <option value="">— Selecione —</option>
                    <option value="Goodreads" {{ old('origem') == 'Goodreads' ? 'selected' : '' }}>Goodreads</option>
                    <option value="Skoob" {{ old('origem') == 'Skoob' ? 'selected' : '' }}>Skoob</option>
                    <option value="Blog" {{ old('origem') == 'Blog' ? 'selected' : '' }}>Blog</option>
                    <option value="Amigo" {{ old('origem') == 'Amigo' ? 'selected' : '' }}>Amigo</option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button class="btn-sage">
                    <i class="bi bi-check-lg"></i> Salvar
                </button>

                <a href="{{ route('avaliacoes.index') }}" class="btn-ghost">
                    Cancelar
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
