@extends('layout')

@section('conteudo')

<div class="card shadow">
<div class="card-body">

<h3 class="mb-4">Novo Livro</h3>

<a href="{{ route('livros.index') }}" class="btn btn-secondary mb-3">Voltar</a>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $erro)
            <div>{{ $erro }}</div>
        @endforeach
    </div>
@endif

<form action="{{ route('livros.store') }}" method="POST">
@csrf

<div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}">
</div>

<div class="mb-3">
    <label class="form-label">Ano</label>
    <input type="number" name="ano" class="form-control" value="{{ old('ano') }}">
</div>

<div class="mb-3">
    <label class="form-label">Autor</label>
    <select name="autor_id" class="form-select">
        @foreach($autores as $autor)
            <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Categoria</label>
    <select name="categoria_id" class="form-select">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Editora</label>
    <select name="editora_id" class="form-select">
        @foreach($editoras as $editora)
            <option value="{{ $editora->id }}">{{ $editora->nome }}</option>
        @endforeach
    </select>
</div>

<button class="btn btn-success">Salvar</button>

</form>

</div>
</div>

@endsection