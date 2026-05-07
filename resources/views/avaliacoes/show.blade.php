@extends('layout')

@section('conteudo')

<div class="card shadow-sm p-4">

    <h1 class="mb-3">
        ⭐ Avaliação {{ $avaliacao->nota }}/5
    </h1>

    <p>
        <strong>Livro:</strong>
        {{ $avaliacao->livro->titulo }}
    </p>

    <p>
        <strong>Título:</strong>
        {{ $avaliacao->titulo ?? 'N/A' }}
    </p>

    <p>
        <strong>Comentário:</strong><br>
        {{ $avaliacao->comentario ?? 'Sem comentário' }}
    </p>

    <p>
        <strong>Usuário:</strong>
        {{ $avaliacao->usuario?->name ?? 'N/A' }}
    </p>

    <p>
        <strong>Origem:</strong>
        {{ $avaliacao->origem ?? 'N/A' }}
    </p>

    <p>
        <strong>Recomendado:</strong>
        {{ $avaliacao->recomendado ? '✓ Sim' : '✗ Não' }}
    </p>

    <a href="{{ route('avaliacoes.index') }}"
       class="btn btn-secondary mt-3">

        Voltar
    </a>

</div>

@endsection