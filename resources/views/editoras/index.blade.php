@extends('layout')

@section('conteudo')

<h1>Editoras</h1>

@if(session('erro'))
    <p style="color:red">{{ session('erro') }}</p>
@endif

<a href="{{ route('editoras.create') }}">Nova Editora</a>

<form method="GET" action="{{ route('editoras.index') }}">
    <input type="text" name="busca" placeholder="Buscar..." value="{{ request('busca') }}">
    <button type="submit">Buscar</button>
</form>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Cidade</th>
    <th>Ano</th>
    <th>Ações</th>
</tr>

@foreach($editoras as $editora)
<tr>
    <td>{{ $editora->nome }}</td>
    <td>{{ $editora->cidade }}</td>
    <td>{{ $editora->ano_fundacao ?? '-' }}</td>
    <td>
        <a href="{{ route('editoras.show', $editora->id) }}">Detalhes</a>
        <a href="{{ route('editoras.edit', $editora->id) }}">Editar</a>

        <form action="{{ route('editoras.destroy', $editora->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </td>
</tr>
@endforeach
</table>

@endsection