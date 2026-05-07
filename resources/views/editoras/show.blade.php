@extends('layout')
@section('conteudo')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('editoras.index') }}" class="btn-ghost btn-icon-only"><i class="bi bi-arrow-left"></i></a>
    <h1 class="section-heading"><i class="bi bi-building"></i> Editora</h1>
</div>
<div class="lib-card" style="max-width:520px;">
    <div class="lib-card-header">
        <span class="lib-card-title">{{ $editora->nome }}</span>
        <a href="{{ route('editoras.edit', $editora->id) }}" class="btn-gold" style="font-size:.78rem;padding:6px 14px;"><i class="bi bi-pencil"></i> Editar</a>
    </div>
    <div class="p-4">
        <div class="detail-grid">
            <div class="detail-item">
                <span class="detail-label">Cidade</span>
                <span class="detail-value">{{ $editora->cidade ?? '—' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Ano de Fundação</span>
                <span class="detail-value">
                    @if($editora->ano_fundacao)
                        <span class="lib-badge lib-badge-mist" style="font-size:.9rem;padding:5px 14px;">{{ $editora->ano_fundacao }}</span>
                    @else —
                    @endif
                </span>
            </div>
        </div>
    </div>
</div>
@push('styles')
<style>
.section-heading{font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;margin:0;display:flex;align-items:center;gap:10px;color:var(--ink);}
.section-heading i{color:var(--gold);font-size:1.4rem;}
.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:24px;}
.detail-item{display:flex;flex-direction:column;gap:6px;}
.detail-label{font-size:.72rem;font-weight:500;letter-spacing:.08em;text-transform:uppercase;color:var(--mist);}
.detail-value{font-size:.95rem;color:var(--ink);}
</style>
@endpush
@endsection