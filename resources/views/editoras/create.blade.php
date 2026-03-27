@extends('layout')

@section('conteudo')

<h1 class="mb-4">Nova Editora</h1>

<form action="{{ route('editoras.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Ano de fundação</label>
        <input type="number" name="ano_fundacao" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('editoras.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection