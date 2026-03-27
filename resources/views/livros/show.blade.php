@extends('layout')

@section('conteudo')

<div class="card shadow">
<div class="card-body">

<h3 class="mb-3">{{ $livro->titulo }}</h3>

<p><strong>Ano:</strong> {{ $livro->ano }}</p>
<p><strong>Autor:</strong> {{ $livro->autor->nome ?? '-' }}</p>
<p><strong>Categoria:</strong> {{ $livro->categoria->nome ?? '-' }}</p>
<p><strong>Editora:</strong> {{ $livro->editora->nome ?? '-' }}</p>

<a href="{{ route('livros.index') }}" class="btn btn-secondary mt-3">Voltar</a>

</div>
</div>

@endsection