@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h1 class="section-heading"><i class="bi bi-tag"></i> Categorias</h1>
        <p class="section-sub">Gêneros e classificações literárias</p>
    </div>

    <div class="d-flex gap-2 align-items-center flex-wrap">
        <form method="GET" action="{{ route('categorias.index') }}" class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text" name="busca" placeholder="Buscar categoria..." value="{{ request('busca') }}" style="width:200px;">
        </form>
        <a href="{{ route('categorias.create') }}" class="btn-sage">
            <i class="bi bi-plus-lg"></i> Nova Categoria
        </a>
    </div>
</div>

<div class="lib-card">
    <div class="table-responsive">
        <table class="lib-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th style="text-align:right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                <tr>
                    <td>
                        <span class="lib-badge lib-badge-gold" style="font-size:.85rem; padding:5px 12px;">
                            {{ $categoria->nome }}
                        </span>
                    </td>
                    <td style="color:var(--mist); font-size:.88rem;">
                        {{ $categoria->descricao ?? '—' }}
                    </td>
                    <td>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('categorias.show', $categoria->id) }}" class="btn-ghost btn-icon-only" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn-gold btn-icon-only" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Excluir {{ addslashes($categoria->nome) }}?')">
                                @csrf @method('DELETE')
                                <button class="btn-rust btn-icon-only" title="Excluir">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-5" style="color:var(--mist);">
                        <i class="bi bi-tag" style="font-size:2rem;display:block;margin-bottom:8px;"></i>
                        Nenhuma categoria encontrada
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('styles')
<style>
    .section-heading { font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; margin:0; display:flex; align-items:center; gap:10px; color:var(--ink); }
    .section-heading i { color:var(--gold); font-size:1.4rem; }
    .section-sub { color:var(--mist); font-size:.85rem; margin:4px 0 0 34px; }
</style>
@endpush

@endsection