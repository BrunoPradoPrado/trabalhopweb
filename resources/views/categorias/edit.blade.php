@extends('layout')

@section('conteudo')

<h1 class="mb-4">Editar Categoria</h1>

<form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <input type="text" name="descricao" class="form-control" value="{{ $categoria->descricao }}">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection