@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('livros.index') }}" class="btn-ghost btn-icon-only">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div>
        <h1 class="section-heading"><i class="bi bi-book"></i> Detalhes do Livro</h1>
    </div>
</div>

<div class="show-layout">

    <div class="lib-card">
        <div class="lib-card-header">
            <span class="lib-card-title">{{ $livro->titulo }}</span>
            <a href="{{ route('livros.edit', $livro->id) }}" class="btn-gold" style="font-size:.78rem; padding:6px 14px;">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
        <div class="p-4">
            <div class="detail-grid">
                <div class="detail-item">
                    <span class="detail-label">Ano de Publicação</span>
                    <span class="detail-value">
                        <span class="lib-badge lib-badge-mist" style="font-size:.9rem; padding:5px 14px;">{{ $livro->ano ?? '—' }}</span>
                    </span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Autor</span>
                    <span class="detail-value">
                        @if($livro->autor)
                            <a href="{{ route('autores.show', $livro->autor->id) }}" style="color:var(--gold); text-decoration:none; font-weight:500;">
                                {{ $livro->autor->nome }}
                            </a>
                        @else —
                        @endif
                    </span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Categoria</span>
                    <span class="detail-value">
                        @if($livro->categoria)
                            <span class="lib-badge lib-badge-gold">{{ $livro->categoria->nome }}</span>
                        @else —
                        @endif
                    </span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Editora</span>
                    <span class="detail-value">{{ $livro->editora->nome ?? '—' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

@push('styles')
<style>
    .section-heading { font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; margin:0; display:flex; align-items:center; gap:10px; color:var(--ink); }
    .section-heading i { color:var(--gold); font-size:1.4rem; }

    .show-layout { max-width: 640px; }

    .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
    @media(max-width:480px){ .detail-grid { grid-template-columns:1fr; } }

    .detail-item { display: flex; flex-direction: column; gap: 6px; }
    .detail-label { font-size: .72rem; font-weight: 500; letter-spacing: .08em; text-transform: uppercase; color: var(--mist); }
    .detail-value { font-size: .95rem; color: var(--ink); }
</style>
@endpush

@endsection