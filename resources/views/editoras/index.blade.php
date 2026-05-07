@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h1 class="section-heading"><i class="bi bi-building"></i> Editoras</h1>
        <p class="section-sub">Casas editoriais cadastradas</p>
    </div>

    <div class="d-flex gap-2 align-items-center flex-wrap">
        <form method="GET" action="{{ route('editoras.index') }}" class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text" name="busca" placeholder="Buscar editora..." value="{{ request('busca') }}" style="width:200px;">
        </form>
        <a href="{{ url('editoras/chart') }}" class="btn-rust">
            <i class="bi bi-bar-chart-line"></i> Gráfico
        </a>
        <a href="{{ url('editoras/report') }}" class="btn-ghost">
            <i class="bi bi-file-earmark-text"></i> Relatório
        </a>
        <a href="{{ route('editoras.create') }}" class="btn-sage">
            <i class="bi bi-plus-lg"></i> Nova Editora
        </a>
    </div>
</div>

<div class="lib-card">
    <div class="table-responsive">
        <table class="lib-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Fundação</th>
                    <th style="text-align:right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($editoras as $editora)
                <tr>
                    <td>
                        <span class="fw-semibold" style="font-family:'Playfair Display',serif;">{{ $editora->nome }}</span>
                    </td>
                    <td>
                        @if($editora->cidade)
                            <span style="color:var(--mist);"><i class="bi bi-geo-alt" style="color:var(--gold);font-size:.8rem;"></i> {{ $editora->cidade }}</span>
                        @else —
                        @endif
                    </td>
                    <td>
                        @if($editora->ano_fundacao)
                            <span class="lib-badge lib-badge-mist">{{ $editora->ano_fundacao }}</span>
                        @else —
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('editoras.show', $editora->id) }}" class="btn-ghost btn-icon-only" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('editoras.edit', $editora->id) }}" class="btn-gold btn-icon-only" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('editoras.destroy', $editora->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Excluir {{ addslashes($editora->nome) }}?')">
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
                    <td colspan="4" class="text-center py-5" style="color:var(--mist);">
                        <i class="bi bi-building" style="font-size:2rem;display:block;margin-bottom:8px;"></i>
                        Nenhuma editora encontrada
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