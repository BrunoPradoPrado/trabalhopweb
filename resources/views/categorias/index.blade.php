<h1>Categorias</h1>

@if(session('erro'))
    <p style="color:red">{{ session('erro') }}</p>
@endif

<a href="{{ route('categorias.create') }}">Nova Categoria</a>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Ações</th>
</tr>

@foreach($categorias as $categoria)
<tr>
    <td>{{ $categoria->nome }}</td>
    <td>{{ $categoria->descricao }}</td>
    <td>
        <a href="{{ route('categorias.show', $categoria->id) }}">Ver</a>
        <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>

        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </td>
</tr>
@endforeach
</table>