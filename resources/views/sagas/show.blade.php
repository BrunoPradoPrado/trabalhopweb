@extends('layout')
@section('conteudo')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('sagas.index') }}" class="btn-ghost btn-icon-only"><i class="bi bi-arrow-left"></i></a>
    <h1 class="section-heading"><i class="bi bi-collection"></i> Saga</h1>
</div>
<div class="saga-layout">
    <div class="lib-card">
        <div class="lib-card-header">
            <span class="lib-card-title">{{ $saga->nome }}</span>
            <a href="{{ route('sagas.edit', $saga->id) }}" class="btn-gold" style="font-size:.78rem;padding:6px 14px;"><i class="bi bi-pencil"></i> Editar</a>
        </div>
        <div class="p-4">
            <label class="lib-label">Descrição</label>
            <p style="font-size:.95rem;line-height:1.7;margin-bottom:20px;">{{ $saga->descricao ?? 'Sem descrição.' }}</p>
            <div class="detail-grid">
                <div class="detail-item">
                    <span class="detail-label">Volumes</span>
                    <span class="detail-value"><span class="lib-badge lib-badge-mist" style="font-size:.9rem;padding:5px 14px;">{{ $saga->quantidade_livros }}</span></span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Ano de Início</span>
                    <span class="detail-value">{{ $saga->ano_inicio ?? '—' }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="lib-card">
        <div class="lib-card-header">
            <span class="lib-card-title"><i class="bi bi-book" style="color:var(--gold);"></i> Livros da Saga</span>
            <span class="lib-badge lib-badge-mist">{{ $saga->livros->count() }}</span>
        </div>
        <div class="p-4">
            @forelse($saga->livros as $livro)
                <div class="livro-row">
                    <div class="livro-spine"></div>
                    <span style="font-family:'Playfair Display',serif; font-weight:600;">{{ $livro->titulo }}</span>
                </div>
            @empty
                <div class="text-center py-4" style="color:var(--mist);"><i class="bi bi-book" style="font-size:1.8rem;display:block;margin-bottom:8px;"></i>Nenhum livro vinculado</div>
            @endforelse
        </div>
    </div>
</div>
@push('styles')
<style>
.section-heading{font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;margin:0;display:flex;align-items:center;gap:10px;color:var(--ink);}
.section-heading i{color:var(--gold);font-size:1.4rem;}
.saga-layout{display:grid;grid-template-columns:1fr 1fr;gap:20px;align-items:start;}
@media(max-width:700px){.saga-layout{grid-template-columns:1fr;}}
.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
.detail-item{display:flex;flex-direction:column;gap:6px;}
.detail-label{font-size:.72rem;font-weight:500;letter-spacing:.08em;text-transform:uppercase;color:var(--mist);}
.detail-value{font-size:.95rem;color:var(--ink);}
.livro-row{display:flex;align-items:center;gap:14px;padding:12px 0;border-bottom:1px solid var(--border);}
.livro-row:last-child{border-bottom:none;}
.livro-spine{width:4px;height:36px;border-radius:2px;background:var(--gold);flex-shrink:0;}
</style>
@endpush
@endsection