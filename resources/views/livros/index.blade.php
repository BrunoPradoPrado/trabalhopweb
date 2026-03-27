@extends('layout')

@section('conteudo')

<div class="d-flex justify-content-between mb-3">
    <h2>Livros</h2>
    <a href="{{ route('livros.create') }}" class="btn btn-success">Novo Livro</a>
</div>

<form method="GET" class="mb-3">
<div class="input-group">
    <input type="text" name="busca" class="form-control" placeholder="Buscar..." value="{{ request('busca') }}">
    <button class="btn btn-dark">Buscar</button>
</div>
</form>

<div class="card shadow">
<div class="table-responsive">
<table class="table table-hover mb-0">

<thead class="table-dark">
<tr>
<th>Título</th>
<th>Ano</th>
<th>Autor</th>
<th>Categoria</th>
<th>Editora</th>
<th>Ações</th>
</tr>
</thead>

<tbody>
@foreach($livros as $livro)
<tr>
<td>{{ $livro->titulo }}</td>
<td>{{ $livro->ano }}</td>
<td>{{ $livro->autor->nome ?? '-' }}</td>
<td>{{ $livro->categoria->nome ?? '-' }}</td>
<td>{{ $livro->editora->nome ?? '-' }}</td>

<td>
<a href="{{ route('livros.show', $livro->id) }}" class="btn btn-sm btn-info">Ver</a>
<a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-sm btn-warning">Editar</a>

<form action="{{ route('livros.destroy', $livro->id) }}" method="POST" class="d-inline">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
</form>
</td>

</tr>
@endforeach
</tbody>

</table>
</div>
</div>

<div class="mt-3">
{{ $livros->links() }}
</div>

@endsection