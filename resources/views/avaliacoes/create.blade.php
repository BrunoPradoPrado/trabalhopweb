@extends('layout')

@section('conteudo')

<h1 class="mb-4">Nova Avaliação</h1>

<form action="{{ route('avaliacoes.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Livro</label>

        <select name="livro_id" class="form-select" required>

            <option value="">Selecione</option>

            @foreach($livros as $livro)
                <option value="{{ $livro->id }}">
                    {{ $livro->titulo }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Usuário</label>

        <select name="usuario_id" class="form-select">

            <option value="">Selecione (opcional)</option>

            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">
                    {{ $usuario->name }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Nota</label>

        <input type="number"
               name="nota"
               class="form-control"
               min="1"
               max="5"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Título</label>

        <input type="text"
               name="titulo"
               class="form-control"
               placeholder="Título da avaliação">
    </div>

    <div class="mb-3">
        <label class="form-label">Comentário</label>

        <textarea name="comentario"
                  class="form-control"
                  rows="4"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Recomendado</label>

        <select name="recomendado" class="form-select">
            <option value="">Selecione</option>
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Origem</label>

        <select name="origem" class="form-select">
            <option value="">Selecione (opcional)</option>
            <option value="Goodreads">Goodreads</option>
            <option value="Skoob">Skoob</option>
            <option value="Blog">Blog</option>
            <option value="Amigo">Amigo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">
        Salvar
    </button>

    <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary">
        Voltar
    </a>

</form>

@endsection