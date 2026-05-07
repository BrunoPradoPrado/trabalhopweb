@extends('layout')

@section('conteudo')

<h1 class="mb-4">Editar Avaliação</h1>

<form action="{{ route('avaliacoes.update', $avaliacao->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Livro</label>

        <select name="livro_id" class="form-select" required>

            @foreach($livros as $livro)

                <option value="{{ $livro->id }}"
                    {{ $avaliacao->livro_id == $livro->id ? 'selected' : '' }}>

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

                <option value="{{ $usuario->id }}"
                    {{ $avaliacao->usuario_id == $usuario->id ? 'selected' : '' }}>

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
               value="{{ $avaliacao->nota }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Título</label>

        <input type="text"
               name="titulo"
               class="form-control"
               placeholder="Título da avaliação"
               value="{{ $avaliacao->titulo }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Comentário</label>

        <textarea name="comentario"
                  class="form-control"
                  rows="4">{{ $avaliacao->comentario }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Recomendado</label>

        <select name="recomendado" class="form-select">
            <option value="">Selecione</option>
            <option value="1" {{ $avaliacao->recomendado == 1 ? 'selected' : '' }}>Sim</option>
            <option value="0" {{ $avaliacao->recomendado == 0 ? 'selected' : '' }}>Não</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Origem</label>

        <select name="origem" class="form-select">
            <option value="">Selecione (opcional)</option>
            <option value="Goodreads" {{ $avaliacao->origem == 'Goodreads' ? 'selected' : '' }}>Goodreads</option>
            <option value="Skoob" {{ $avaliacao->origem == 'Skoob' ? 'selected' : '' }}>Skoob</option>
            <option value="Blog" {{ $avaliacao->origem == 'Blog' ? 'selected' : '' }}>Blog</option>
            <option value="Amigo" {{ $avaliacao->origem == 'Amigo' ? 'selected' : '' }}>Amigo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">
        Atualizar
    </button>

    <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary">
        Voltar
    </a>

</form>

@endsection