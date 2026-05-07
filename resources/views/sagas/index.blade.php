@extends('layout')

@section('conteudo')

<h1 class="mb-4">Sagas</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
@endif

<div class="d-flex justify-content-between mb-3">

    <a href="{{ route('sagas.create') }}" class="btn btn-success">
        + Nova Saga
    </a>

    <form method="GET" action="{{ route('sagas.index') }}" class="d-flex">
        <input type="text"
               name="busca"
               class="form-control me-2"
               placeholder="Buscar..."
               value="{{ request('busca') }}">

        <button type="submit" class="btn btn-outline-primary">
            Buscar
        </button>
    </form>

</div>

<table class="table table-striped table-hover shadow-sm align-middle">

    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Ano de início</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

    @foreach($sagas as $saga)
        <tr>
            <td>{{ $saga->nome }}</td>
            <td>{{ $saga->descricao }}</td>
            <td>{{ $saga->quantidade_livros }}</td>
            <td>{{ $saga->ano_inicio ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('sagas.show', $saga->id) }}" class="btn btn-sm btn-info">
                    Ver
                </a>

                <a href="{{ route('sagas.edit', $saga->id) }}" class="btn btn-sm btn-warning">
                    Editar
                </a>

                <form action="{{ route('sagas.destroy', $saga->id) }}"
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