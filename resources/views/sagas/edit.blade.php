@extends('layout')
@section('conteudo')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('sagas.index') }}" class="btn-ghost btn-icon-only"><i class="bi bi-arrow-left"></i></a>
    <div>
        <h1 class="section-heading"><i class="bi bi-pencil"></i> Editar Saga</h1>
        <p class="section-sub">{{ $saga->nome }}</p>
    </div>
</div>
<div class="lib-card" style="max-width:560px;">
    <div class="lib-card-header"><span class="lib-card-title">Dados da Saga</span></div>
    <div class="p-4">
        <form action="{{ route('sagas.update', $saga->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4"><label class="lib-label">Nome</label><input type="text" name="nome" class="lib-input" value="{{ old('nome', $saga->nome) }}" required></div>
            <div class="mb-4"><label class="lib-label">Descrição</label><textarea name="descricao" class="lib-input" rows="3" required>{{ old('descricao', $saga->descricao) }}</textarea></div>
            <div class="form-row">
                <div class="mb-4"><label class="lib-label">Quantidade de Livros</label><input type="number" name="quantidade_livros" class="lib-input" value="{{ old('quantidade_livros', $saga->quantidade_livros) }}" min="1" required></div>
                <div class="mb-4"><label class="lib-label">Ano de Início</label><input type="number" name="ano_inicio" class="lib-input" value="{{ old('ano_inicio', $saga->ano_inicio) }}" min="1000" max="{{ date('Y') }}" required></div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn-gold"><i class="bi bi-check-lg"></i> Atualizar</button>
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