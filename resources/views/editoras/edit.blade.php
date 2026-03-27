@extends('layout')

@section('conteudo')

<h1 class="mb-4">Editar Editora</h1>

<form action="{{ route('editoras.update', $editora->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $editora->nome }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control" value="{{ $editora->cidade }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Ano de fundação</label>
        <input type="number" name="ano_fundacao" class="form-control" value="{{ $editora->ano_fundacao }}">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('editoras.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection