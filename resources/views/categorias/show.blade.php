@extends('layout')

@section('conteudo')

<div class="card shadow-sm p-4">
    <h1>{{ $categoria->nome }}</h1>

    <p><strong>Descrição:</strong> {{ $categoria->descricao ?? '-' }}</p>

    <hr>

    <h4>Livros</h4>

    @forelse($categoria->livros as $livro)
        <p class="mb-1">📚 {{ $livro->titulo }}</p>
    @empty
        <p class="text-muted">Nenhum livro cadastrado</p>
    @endforelse

    <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>

@endsection