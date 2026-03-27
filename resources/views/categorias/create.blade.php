@extends('layout')

@section('conteudo')

<h1 class="mb-4">Nova Categoria</h1>

<form action="{{ route('categorias.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <input type="text" name="descricao" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection