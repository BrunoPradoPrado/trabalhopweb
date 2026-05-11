@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('avaliacoes.index') }}" class="btn-ghost btn-icon-only">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>
        <h1 class="section-heading">
            <i class="bi bi-star"></i> Avaliação
        </h1>
        <p class="section-sub">Veja os detalhes e histórico desta avaliação</p>
    </div>
</div>

<div class="lib-card" style="max-width:640px;">

    <div class="lib-card-header">
        <span class="lib-card-title">
            ⭐ {{ $avaliacao->nota }}/5
        </span>
    </div>

    <div class="p-4">

        <div class="mb-3"><strong>Livro:</strong> {{ $avaliacao->livro->titulo }}</div>
        <div class="mb-3"><strong>Título:</strong> {{ $avaliacao->titulo ?? '-' }}</div>
        <div class="mb-3"><strong>Comentário:</strong> {{ $avaliacao->comentario ?? '-' }}</div>
        <div class="mb-3"><strong>Origem:</strong> {{ $avaliacao->origem ?? '-' }}</div>
        <div class="mb-3"><strong>Recomendado:</strong> {{ $avaliacao->recomendado ? 'Sim' : 'Não' }}</div>

        <a href="{{ route('avaliacoes.index') }}" class="btn-ghost mt-3">
            Voltar
        </a>

    </div>

</div>

@endsection
