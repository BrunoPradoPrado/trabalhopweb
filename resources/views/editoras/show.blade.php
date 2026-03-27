@extends('layout')

@section('conteudo')

<div class="card shadow-sm p-4">
    <h1>{{ $editora->nome }}</h1>

    <p><strong>Cidade:</strong> {{ $editora->cidade }}</p>
    <p><strong>Ano de fundação:</strong> {{ $editora->ano_fundacao ?? '-' }}</p>

    <hr>

    <h4>Livros</h4>

    @forelse($editora->livros as $livro)
        <p class="mb-1">📚 {{ $livro->titulo }}</p>
    @empty
        <p class="text-muted">Nenhum livro cadastrado</p>
    @endforelse

    <a href="{{ route('editoras.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>

@endsection