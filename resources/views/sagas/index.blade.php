@extends('layout')
@section('conteudo')
<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h1 class="section-heading"><i class="bi bi-collection"></i> Sagas</h1>
        <p class="section-sub">Séries e coleções de livros</p>
    </div>
    <div class="d-flex gap-2 align-items-center flex-wrap">
        <form method="GET" action="{{ route('sagas.index') }}" class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text" name="busca" placeholder="Buscar saga..." value="{{ request('busca') }}" style="width:200px;">
        </form>
        <a href="{{ route('sagas.create') }}" class="btn-sage"><i class="bi bi-plus-lg"></i> Nova Saga</a>
    </div>
</div>
<div class="lib-card">
    <div class="table-responsive">
        <table class="lib-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Volumes</th>
                    <th>Início</th>
                    <th style="text-align:right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sagas as $saga)
                <tr>
                    <td><span class="fw-semibold" style="font-family:'Playfair Display',serif;">{{ $saga->nome }}</span></td>
                    <td style="color:var(--mist);font-size:.88rem;max-width:260px;">{{ Str::limit($saga->descricao, 60) ?? '—' }}</td>
                    <td><span class="lib-badge lib-badge-mist">{{ $saga->quantidade_livros }} vol.</span></td>
                    <td>{{ $saga->ano_inicio ?? '—' }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('sagas.show', $saga->id) }}" class="btn-ghost btn-icon-only" title="Ver"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('sagas.edit', $saga->id) }}" class="btn-gold btn-icon-only" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('sagas.destroy', $saga->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Excluir?')">
                                @csrf @method('DELETE')
                                <button class="btn-rust btn-icon-only"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-5" style="color:var(--mist);"><i class="bi bi-collection" style="font-size:2rem;display:block;margin-bottom:8px;"></i>Nenhuma saga encontrada</td></tr>
                @endforelse
            </tbody>
        </table>
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