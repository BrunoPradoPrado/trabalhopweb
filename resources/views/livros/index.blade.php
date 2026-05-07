@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">

    <div>
        <h1 class="section-heading"><i class="bi bi-book"></i> Livros</h1>
        <p class="section-sub">Acervo completo da biblioteca</p>
    </div>

    <div class="d-flex gap-2 align-items-center flex-wrap">
        <form method="GET" class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text" name="busca" placeholder="Buscar livro..." value="{{ request('busca') }}" style="width:220px;">
        </form>
        <a href="{{ route('livros.create') }}" class="btn-sage">
            <i class="bi bi-plus-lg"></i> Novo Livro
        </a>
    </div>

</div>

<div class="lib-card">
    <div class="table-responsive">
        <table class="lib-table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ano</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Editora</th>
                    <th style="text-align:right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($livros as $livro)
                <tr>
                    <td>
                        <span class="fw-semibold" style="font-family:'Playfair Display',serif;">
                            {{ $livro->titulo }}
                        </span>
                    </td>
                    <td>
                        <span class="lib-badge lib-badge-mist">{{ $livro->ano }}</span>
                    </td>
                    <td>{{ $livro->autor->nome ?? '—' }}</td>
                    <td>
                        @if($livro->categoria)
                            <span class="lib-badge lib-badge-gold">{{ $livro->categoria->nome }}</span>
                        @else —
                        @endif
                    </td>
                    <td>{{ $livro->editora->nome ?? '—' }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('livros.show', $livro->id) }}" class="btn-ghost btn-icon-only" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('livros.edit', $livro->id) }}" class="btn-gold btn-icon-only" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Excluir {{ addslashes($livro->titulo) }}?')">
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
                    <td colspan="6" class="text-center py-5" style="color:var(--mist);">
                        <i class="bi bi-book" style="font-size:2rem;display:block;margin-bottom:8px;"></i>
                        Nenhum livro encontrado
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($livros->hasPages())
<div class="mt-3 d-flex justify-content-center">
    {{ $livros->links() }}
</div>
@endif

@push('styles')
<style>
    .section-heading {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--ink);
    }
    .section-heading i { color: var(--gold); font-size: 1.4rem; }
    .section-sub { color: var(--mist); font-size: .85rem; margin: 4px 0 0 34px; }
</style>
@endpush

@endsection