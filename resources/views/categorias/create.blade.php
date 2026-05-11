@extends('layout')
@section('conteudo')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('categorias.index') }}" class="btn-ghost btn-icon-only"><i class="bi bi-arrow-left"></i></a>
    <div>
        <h1 class="section-heading"><i class="bi bi-tag"></i> Nova Categoria</h1>
        <p class="section-sub">Crie um novo gênero literário</p>
    </div>
</div>
<div class="lib-card" style="max-width:520px;">
    <div class="lib-card-header"><span class="lib-card-title">Dados da Categoria</span></div>
    <div class="p-4">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="lib-label">Nome</label>
                <input type="text" name="nome" class="lib-input" value="{{ old('nome') }}" placeholder="Ex.: Ficção Científica" required>
            </div>
            <div class="mb-5">
                <label class="lib-label">Descrição</label>
                <textarea name="descricao" class="lib-input" rows="3" placeholder="Breve descrição do gênero..." required>{{ old('descricao') }}</textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn-sage"><i class="bi bi-check-lg"></i> Salvar</button>
                <a href="{{ route('categorias.index') }}" class="btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@push('styles')
<style>
    .section-heading{font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;margin:0;display:flex;align-items:center;gap:10px;color:var(--ink);}
    .section-heading i{color:var(--gold);font-size:1.4rem;}
    .section-sub{color:var(--mist);font-size:.85rem;margin:4px 0 0 34px;}
</style>
@endpush
@endsection