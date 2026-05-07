@extends('layout')
@section('conteudo')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('sagas.index') }}" class="btn-ghost btn-icon-only"><i class="bi bi-arrow-left"></i></a>
    <div>
        <h1 class="section-heading"><i class="bi bi-collection"></i> Nova Saga</h1>
        <p class="section-sub">Crie uma nova série ou coleção</p>
    </div>
</div>
<div class="lib-card" style="max-width:560px;">
    <div class="lib-card-header"><span class="lib-card-title">Dados da Saga</span></div>
    <div class="p-4">
        <form action="{{ route('sagas.store') }}" method="POST">
            @csrf
            <div class="mb-4"><label class="lib-label">Nome da Saga</label><input type="text" name="nome" class="lib-input" value="{{ old('nome') }}" placeholder="Ex.: O Senhor dos Anéis" required></div>
            <div class="mb-4"><label class="lib-label">Descrição</label><textarea name="descricao" class="lib-input" rows="3" placeholder="Descreva a saga...">{{ old('descricao') }}</textarea></div>
            <div class="form-row">
                <div class="mb-4"><label class="lib-label">Quantidade de Livros</label><input type="number" name="quantidade_livros" class="lib-input" value="{{ old('quantidade_livros') }}" placeholder="Ex.: 3" min="1"></div>
                <div class="mb-4"><label class="lib-label">Ano de Início</label><input type="number" name="ano_inicio" class="lib-input" value="{{ old('ano_inicio') }}" placeholder="Ex.: 1954" min="1000" max="{{ date('Y') }}"></div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn-sage"><i class="bi bi-check-lg"></i> Salvar</button>
                <a href="{{ route('sagas.index') }}" class="btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@push('styles')
<style>
.section-heading{font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;margin:0;display:flex;align-items:center;gap:10px;color:var(--ink);}
.section-heading i{color:var(--gold);font-size:1.4rem;}
.section-sub{color:var(--mist);font-size:.85rem;margin:4px 0 0 34px;}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:0 20px;}
@media(max-width:560px){.form-row{grid-template-columns:1fr;}}
</style>
@endpush
@endsection