@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h1 class="section-heading"><i class="bi bi-person-badge"></i> Autores</h1>
        <p class="section-sub">Escritores cadastrados na biblioteca</p>
    </div>

    <div class="d-flex gap-2 align-items-center flex-wrap">
        <form method="GET" action="{{ route('autores.index') }}" class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text" name="busca" placeholder="Buscar autor..." value="{{ request('busca') }}" style="width:200px;">
        </form>
        <a href="{{ url('autores/chart') }}" class="btn-rust">
            <i class="bi bi-bar-chart-line"></i> Gráfico
        </a>
        <a href="{{ url('autores/report') }}" class="btn-ghost">
            <i class="bi bi-file-earmark-text"></i> Relatório
        </a>
        <a href="{{ route('autores.create') }}" class="btn-sage">
            <i class="bi bi-plus-lg"></i> Novo Autor
        </a>
    </div>
</div>

<div class="lib-card">
    <div class="table-responsive">
        <table class="lib-table">
            <thead>
                <tr>
                    <th style="width:56px;"></th>
                    <th>Nome</th>
                    <th>Nacionalidade</th>
                    <th style="text-align:right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($autores as $autor)
                <tr>
                    <td>
                        @if($autor->imagem)
                            <img src="{{ asset('storage/' . $autor->imagem) }}" class="lib-avatar" alt="{{ $autor->nome }}">
                        @else
                            <div class="lib-avatar-placeholder">
                                <i class="bi bi-person"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <span class="fw-semibold" style="font-family:'Playfair Display',serif;">
                            {{ $autor->nome }}
                        </span>
                    </td>
                    <td>
                        <span class="lib-badge lib-badge-sage">{{ $autor->nacionalidade }}</span>
                    </td>
                    <td>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('autores.show', $autor->id) }}" class="btn-ghost btn-icon-only" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('autores.edit', $autor->id) }}" class="btn-gold btn-icon-only" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Excluir {{ addslashes($autor->nome) }}?')">
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
                        <i class="bi bi-person-badge" style="font-size:2rem;display:block;margin-bottom:8px;"></i>
                        Nenhum autor encontrado
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