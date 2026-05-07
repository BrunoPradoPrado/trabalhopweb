@extends('layout')

@section('conteudo')

<div class="card shadow-sm p-4">

    <h1 class="mb-3">{{ $saga->nome }}</h1>

    <p>
        <strong>Descrição:</strong><br>
        {{ $saga->descricao ?? 'Sem descrição' }}
    </p>

    <p>
        <strong>Quantidade de livros:</strong>
        {{ $saga->quantidade_livros }}
    </p>

    <p>
        <strong>Ano de início:</strong>
        {{ $saga->ano_inicio ?? 'N/A' }}
    </p>

    <hr>

    <h4>Livros da Saga</h4>

    @forelse($saga->livros as $livro)
        <p class="mb-1">📚 {{ $livro->titulo }}</p>
    @empty
        <p class="text-muted">Nenhum livro cadastrado</p>
    @endforelse

    <a href="{{ route('sagas.index') }}" class="btn btn-secondary mt-3">
        Voltar
    </a>

</div>

@endsection