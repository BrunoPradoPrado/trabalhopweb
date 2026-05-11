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
                    <option value="">Selecione</option>
                    @foreach($livros as $livro)
                        <option value="{{ $livro->id }}">{{ $livro->titulo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="lib-label">Nota (1 a 5)</label>
                <input type="number" name="nota" class="lib-input" min="1" max="5" required>
            </div>

            <div class="mb-4">
                <label class="lib-label">Título</label>
                <input type="text" name="titulo" class="lib-input" placeholder="Resumo da avaliação">
            </div>

            <div class="mb-4">
                <label class="lib-label">Comentário</label>
                <textarea name="comentario" class="lib-input" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label class="lib-label">Recomendado</label>
                <select name="recomendado" class="lib-input">
                    <option value="">Selecione</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="lib-label">Origem</label>
                <select name="origem" class="lib-input">
                    <option value="">Opcional</option>
                    <option value="Goodreads">Goodreads</option>
                    <option value="Skoob">Skoob</option>
                    <option value="Blog">Blog</option>
                    <option value="Amigo">Amigo</option>
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
