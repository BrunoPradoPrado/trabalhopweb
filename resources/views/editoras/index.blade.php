<h1>Editoras</h1>

@if(session('erro'))
    <p style="color:red">{{ session('erro') }}</p>
@endif

<a href="{{ route('editoras.create') }}">Nova Editora</a>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Cidade</th>
    <th>Ações</th>
</tr>

@foreach($editoras as $editora)
<tr>
    <td>{{ $editora->nome }}</td>
    <td>{{ $editora->cidade }}</td>
    <td>
        <a href="{{ route('editoras.show', $editora->id) }}">Ver</a>
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