@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h1 class="section-heading">
            <i class="bi bi-star"></i> Avaliações
        </h1>
        <p class="section-sub">Feedback dos leitores</p>
    </div>

    <a href="{{ route('avaliacoes.create') }}" class="btn-sage">
        <i class="bi bi-plus-lg"></i> Nova Avaliação
    </a>
</div>

<div class="mb-4">
    <form action="{{ route('avaliacoes.index') }}" method="GET" class="d-flex gap-2 flex-wrap">
        <input type="search" name="search" class="lib-input" placeholder="Buscar por livro, título ou origem" value="{{ $search ?? request('search') }}">
        <button type="submit" class="btn-sage">
            <i class="bi bi-search"></i>
            Buscar
        </button>
        @if(request('search'))
            <a href="{{ route('avaliacoes.index') }}" class="btn-ghost">Limpar</a>
        @endif
    </form>
</div>

<div class="lib-card">
    <div class="table-responsive">
        <table class="lib-table">

            <thead>
                <tr>
                    <th>Livro</th>
                    <th>Nota</th>
                    <th>Título</th>
                    <th>Origem</th>
                    <th>Recomendado</th>
                    <th style="text-align:right;">Ações</th>
                </tr>
            </thead>

            <tbody>
                @forelse($avaliacoes as $avaliacao)
                <tr>
                    <td>{{ $avaliacao->livro->titulo }}</td>
                    <td>⭐ {{ $avaliacao->nota }}</td>
                    <td>{{ $avaliacao->titulo ?? '-' }}</td>
                    <td>{{ $avaliacao->origem ?? '-' }}</td>
                    <td>
                        {{ $avaliacao->recomendado ? 'Sim' : 'Não' }}
                    </td>

                    <td>
                        <div class="d-flex gap-2 justify-content-end">

                            <a href="{{ route('avaliacoes.show', $avaliacao->id) }}"
                               class="btn-ghost btn-icon-only">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('avaliacoes.edit', $avaliacao->id) }}"
                               class="btn-gold btn-icon-only">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('avaliacoes.destroy', $avaliacao->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Excluir avaliação?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn-rust btn-icon-only">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center" style="padding:24px; color:var(--mist);">
                        Nenhuma avaliação encontrada.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>

@endsection
