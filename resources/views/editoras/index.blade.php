@extends('layout')

@section('conteudo')

<h1 class="mb-4">Editoras</h1>

@if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
@endif

<div class="d-flex justify-content-between mb-3">
    <a href="{{ route('editoras.create') }}" class="btn btn-success">+ Nova Editora</a>

    <form method="GET" action="{{ route('editoras.index') }}" class="d-flex">
        <input type="text" name="busca" class="form-control me-2" placeholder="Buscar..." value="{{ request('busca') }}">
        <button type="submit" class="btn btn-outline-primary">Buscar</button>
    </form>
</div>

<table class="table table-striped table-hover shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
    @foreach($editoras as $editora)
        <tr>
            <td>{{ $editora->nome }}</td>
            <td>{{ $editora->cidade }}</td>
            <td>{{ $editora->ano_fundacao ?? '-' }}</td>
            <td>
                <a href="{{ route('editoras.show', $editora->id) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('editoras.edit', $editora->id) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('editoras.destroy', $editora->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection