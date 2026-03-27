@extends('layout')

@section('conteudo')

<h1 class="mb-4">Autores</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
@endif

<div class="d-flex justify-content-between mb-3">
    <a href="{{ route('autores.create') }}" class="btn btn-success">+ Novo Autor</a>

    <form method="GET" action="{{ route('autores.index') }}" class="d-flex">
        <input type="text" name="busca" class="form-control me-2" placeholder="Buscar..." value="{{ request('busca') }}">
        <button type="submit" class="btn btn-outline-primary">Buscar</button>
    </form>
</div>

<table class="table table-striped table-hover shadow-sm align-middle">
    <thead class="table-dark">
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Nacionalidade</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
    @foreach($autores as $autor)
        <tr>
            <td>
                @if($autor->imagem)
                    <img src="{{ asset('storage/' . $autor->imagem) }}" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>

            <td>{{ $autor->nome }}</td>
            <td>{{ $autor->nacionalidade }}</td>

            <td>
                <a href="{{ route('autores.show', $autor->id) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection