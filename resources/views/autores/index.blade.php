@extends('layout')

@section('conteudo')

<h1>Autores</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if(session('erro'))
    <p style="color:red">{{ session('erro') }}</p>
@endif

<a href="{{ route('autores.create') }}">Novo Autor</a>

<form method="GET" action="{{ route('autores.index') }}">
    <input type="text" name="busca" placeholder="Buscar..." value="{{ request('busca') }}">
    <button type="submit">Buscar</button>
</form>

<table border="1">
<tr>
    <th>Imagem</th>
    <th>Nome</th>
    <th>Nacionalidade</th>
    <th>Ações</th>
</tr>

@foreach($autores as $autor)
<tr>
    <td>
        @if($autor->imagem)
            <img src="{{ asset('storage/' . $autor->imagem) }}" width="50">
        @else
            -
        @endif
    </td>

    <td>{{ $autor->nome }}</td>
    <td>{{ $autor->nacionalidade }}</td>
    <td>
        <a href="{{ route('autores.show', $autor->id) }}">Detalhes</a>
        <a href="{{ route('autores.edit', $autor->id) }}">Editar</a>

        <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
        </form>
    </td>
</tr>
@endforeach
</table>

@endsection