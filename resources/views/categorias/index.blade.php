@extends('layout')

@section('conteudo')

<h1 class="mb-4">Categorias</h1>

@if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
@endif

<div class="d-flex justify-content-between mb-3">
    <a href="{{ route('categorias.create') }}" class="btn btn-success">+ Nova Categoria</a>

    <form method="GET" action="{{ route('categorias.index') }}" class="d-flex">
        <input type="text" name="busca" class="form-control me-2" placeholder="Buscar..." value="{{ request('busca') }}">
        <button type="submit" class="btn btn-outline-primary">Buscar</button>
    </form>
</div>

<table class="table table-striped table-hover shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->nome }}</td>
            <td>{{ $categoria->descricao ?? '-' }}</td>
            <td>
                <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
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