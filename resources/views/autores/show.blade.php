@extends('layout')

@section('conteudo')

<div class="card shadow-sm p-4">

    <div class="text-center mb-3">
        @if($autor->imagem)
            <img src="{{ asset('storage/' . $autor->imagem) }}" class="rounded-circle shadow" width="150" height="150" style="object-fit: cover;">
        @else
            <div class="text-muted">Sem imagem</div>
        @endif
    </div>

    <h1 class="text-center">{{ $autor->nome }}</h1>

    <p class="text-center"><strong>Nacionalidade:</strong> {{ $autor->nacionalidade }}</p>

    <hr>

    <h4>Livros</h4>

    @forelse($autor->livros as $livro)
        <p class="mb-1">📚 {{ $livro->titulo }}</p>
    @empty
        <p class="text-muted">Nenhum livro cadastrado</p>
    @endforelse

    <a href="{{ route('autores.index') }}" class="btn btn-secondary mt-3">Voltar</a>

</div>

@endsection