@extends('layout')

@section('conteudo')

<h1 class="mb-4">Nova Saga</h1>

<form action="{{ route('sagas.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control" rows="4"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Quantidade de livros</label>
        <input type="number" name="quantidade_livros" class="form-control" min="0" value="0">
    </div>

    <div class="mb-3">
        <label class="form-label">Ano de início</label>
        <input type="number" name="ano_inicio" class="form-control" min="1900" max="{{ date('Y') }}" placeholder="Ex: 2020">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('sagas.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection