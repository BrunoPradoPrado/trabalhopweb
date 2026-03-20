<h1>Livros</h1>

<a href="{{ route('livros.create') }}">Novo Livro</a>

<form method="GET" action="{{ route('livros.index') }}">
    <input type="text" name="busca" placeholder="Buscar livro, autor ou editora..." value="{{ request('busca') }}">
    <button type="submit">Buscar</button>
</form>

<table border="1">
<tr>
<th>Título</th>
<th>Ano</th>
<th>Autor</th>
<th>Categoria</th>
<th>Editora</th>
<th>Ações</th>
</tr>

@foreach($livros as $livro)
<tr>
<td>{{ $livro->titulo }}</td>
<td>{{ $livro->ano }}</td>
<td>{{ $livro->autor->nome ?? '-' }}</td>
<td>{{ $livro->categoria->nome ?? '-' }}</td>
<td>{{ $livro->editora->nome ?? '-' }}</td>

<td>
    <a href="{{ route('livros.show', $livro->id) }}">Detalhes</a>
    <a href="{{ route('livros.edit', $livro->id) }}">Editar</a>

    <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>
</td>
</tr>
@endforeach

</table>

{{ $livros->links() }}