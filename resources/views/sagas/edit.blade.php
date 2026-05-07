@extends('layout')

@section('conteudo')

<h1 class="mb-4">Editar Saga</h1>

<form action="{{ route('sagas.update', $saga->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $saga->nome }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control" rows="4">{{ $saga->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Quantidade de livros</label>
        <input type="number"
               name="quantidade_livros"
               class="form-control"
               min="0"
               value="{{ $saga->quantidade_livros }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Ano de início</label>
        <input type="number"
               name="ano_inicio"
               class="form-control"
               min="1900"
               max="{{ date('Y') }}"
               value="{{ $saga->ano_inicio }}"
               placeholder="Ex: 2020">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('sagas.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection