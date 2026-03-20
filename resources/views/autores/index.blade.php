<h1>Autores</h1>

@if(session('erro'))
    <p style="color:red">{{ session('erro') }}</p>
@endif

<a href="{{ route('autores.create') }}">Novo Autor</a>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Nacionalidade</th>
    <th>Ações</th>
</tr>

@foreach($autores as $autor)
<tr>
    <td>{{ $autor->nome }}</td>
    <td>{{ $autor->nacionalidade }}</td>
    <td>
        <a href="{{ route('autores.show', $autor->id) }}">Ver</a>
        <a href="{{ route('autores.edit', $autor->id) }}">Editar</a>

        <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </td>
</tr>
@endforeach
</table>