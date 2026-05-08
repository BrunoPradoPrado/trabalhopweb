@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('avaliacoes.index') }}" class="btn-ghost btn-icon-only">
        <i class="bi bi-arrow-left"></i>
    </a>

    <h1 class="section-heading">
        <i class="bi bi-star"></i> Avaliação
    </h1>
</div>

<div class="lib-card" style="max-width:600px;">

    <div class="lib-card-header">
        <span class="lib-card-title">
            ⭐ {{ $avaliacao->nota }}/5
        </span>
    </div>

    <div class="p-4">

        <p><strong>Livro:</strong> {{ $avaliacao->livro->titulo }}</p>
        <p><strong>Título:</strong> {{ $avaliacao->titulo ?? '-' }}</p>
        <p><strong>Comentário:</strong> {{ $avaliacao->comentario ?? '-' }}</p>
        <p><strong>Origem:</strong> {{ $avaliacao->origem ?? '-' }}</p>
        <p><strong>Recomendado:</strong> {{ $avaliacao->recomendado ? 'Sim' : 'Não' }}</p>

        <a href="{{ route('avaliacoes.index') }}" class="btn-ghost mt-3">
            Voltar
        </a>

    </div>

</div>

@endsection
