@extends('layout')

@section('conteudo')

<h1 class="mb-4">Novo Autor</h1>

<form action="{{ route('autores.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nacionalidade</label>
        <input type="text" name="nacionalidade" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem</label>
        <input type="file" name="imagem" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('autores.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection