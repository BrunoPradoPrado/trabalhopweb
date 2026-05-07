@extends('layout')
@section('conteudo')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('categorias.index') }}" class="btn-ghost btn-icon-only"><i class="bi bi-arrow-left"></i></a>
    <h1 class="section-heading"><i class="bi bi-tag"></i> Categoria</h1>
</div>
<div class="lib-card" style="max-width:520px;">
    <div class="lib-card-header">
        <span class="lib-card-title">{{ $categoria->nome }}</span>
        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn-gold" style="font-size:.78rem;padding:6px 14px;"><i class="bi bi-pencil"></i> Editar</a>
    </div>
    <div class="p-4">
        <label class="lib-label">Descrição</label>
        <p style="color:var(--ink); font-size:.95rem; line-height:1.6;">{{ $categoria->descricao ?? 'Sem descrição cadastrada.' }}</p>
    </div>
</div>
@push('styles')
<style>
    .section-heading{font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;margin:0;display:flex;align-items:center;gap:10px;color:var(--ink);}
    .section-heading i{color:var(--gold);font-size:1.4rem;}
</style>
@endpush
@endsection