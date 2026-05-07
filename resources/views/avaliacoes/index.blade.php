@extends('layout')

@section('conteudo')

<h1 class="mb-4">Avaliações</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="d-flex justify-content-between mb-3">

    <a href="{{ route('avaliacoes.create') }}" class="btn btn-success">
        + Nova Avaliação
    </a>

</div>

<table class="table table-striped table-hover shadow-sm align-middle">

    <thead class="table-dark">
        <tr>
            <th>Livro</th>
            <th>Nota</th>
            <th>Título</th>
            <th>Usuário</th>
            <th>Origem</th>
            <th>Recomendado</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

    @foreach($avaliacoes as $avaliacao)

        <tr>

            <td>{{ $avaliacao->livro->titulo }}</td>

            <td>⭐ {{ $avaliacao->nota }}</td>

            <td>{{ $avaliacao->titulo }}</td>

            <td>{{ $avaliacao->usuario?->name ?? 'N/A' }}</td>

            <td>{{ $avaliacao->origem ?? 'N/A' }}</td>

            <td>{{ $avaliacao->recomendado ? '✓ Sim' : '✗ Não' }}</td>

            <td>

                <a href="{{ route('avaliacoes.show', $avaliacao->id) }}"
                   class="btn btn-sm btn-info">

                    Ver
                </a>

                <a href="{{ route('avaliacoes.edit', $avaliacao->id) }}"
                   class="btn btn-sm btn-warning">

                    Editar
                </a>

                <form action="{{ route('avaliacoes.destroy', $avaliacao->id) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Tem certeza?')">

                        Excluir
                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection