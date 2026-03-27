@extends('layout')

@section('conteudo')

<h1 class="mb-4">Editar Autor</h1>

<form action="{{ route('autores.update', $autor->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $autor->nome }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nacionalidade</label>
        <input type="text" name="nacionalidade" class="form-control" value="{{ $autor->nacionalidade }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem atual</label><br>
        @if($autor->imagem)
            <img src="{{ asset('storage/' . $autor->imagem) }}" class="img-thumbnail mb-2" width="120">
        @else
            <p class="text-muted">Sem imagem</p>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Nova imagem</label>
        <input type="file" name="imagem" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('autores.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection