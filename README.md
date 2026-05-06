vamos lá. 
create:
@extends('layout')

@section('conteudo')

<h1 class="mb-4">Novo Autor</h1>

<form action="{{ route('autores.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nacionalidade</label>
        <input type="text" name="nacionalidade" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem</label>
        <input type="file" name="imagem" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('autores.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection

edit:
@extends('layout')

@section('conteudo')

<h1 class="mb-4">Editar Autor</h1>

<form action="{{ route('autores.update', $autor->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $autor->nome }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nacionalidade</label>
        <input type="text" name="nacionalidade" class="form-control" value="{{ $autor->nacionalidade }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem atual</label><br>
        @if($autor->imagem)
            <img src="{{ asset('storage/' . $autor->imagem) }}" class="img-thumbnail mb-2" width="120">
        @else
            <p class="text-muted">Sem imagem</p>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Nova imagem</label>
        <input type="file" name="imagem" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('autores.index') }}" class="btn btn-secondary">Voltar</a>
</form>

@endsection

index:
@extends('layout')

@section('conteudo')

<h1 class="mb-4">Autores</h1>

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
    <a href="{{ route('autores.create') }}" class="btn btn-success">+ Novo Autor</a>

    <div class="d-flex gap-2">
        <a href="{{ url('autores/chart') }}" class="btn btn-danger">Gráfico</a>
        <a href="{{ url('autores/report') }}" class="btn btn-secondary">Relatório</a>

        <form method="GET" action="{{ route('autores.index') }}" class="d-flex">
            <input type="text" name="busca" class="form-control me-2" placeholder="Buscar..." value="{{ request('busca') }}">
            <button type="submit" class="btn btn-outline-primary">Buscar</button>
        </form>
    </div>
</div>

<table class="table table-striped table-hover shadow-sm align-middle">
    <thead class="table-dark">
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Nacionalidade</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
    @foreach($autores as $autor)
        <tr>
            <td>
                @if($autor->imagem)
                    <img src="{{ asset('storage/' . $autor->imagem) }}" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>

            <td>{{ $autor->nome }}</td>
            <td>{{ $autor->nacionalidade }}</td>

            <td>
                <a href="{{ route('autores.show', $autor->id) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection

report:
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório de Autores</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th {
            background: #2c3e50;
            color: #fff;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }

        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background: #f5f5f5;
        }

        .footer {
            position: fixed;
            bottom: 0;
            text-align: center;
            font-size: 10px;
            color: #999;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>{{ $titulo }}</h2>
        <p>Gerado automaticamente pelo sistema</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nacionalidade</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>{{ $autor->nacionalidade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Sistema de Livraria - Relatório de Autores
    </div>

</body>
</html>

show (opcional):
@extends('layout')

@section('conteudo')

<div class="card shadow-sm p-4">

    <div class="text-center mb-3">
        @if($autor->imagem)
            <img src="{{ asset('storage/' . $autor->imagem) }}" class="rounded-circle shadow" width="150" height="150" style="object-fit: cover;">
        @else
            <div class="text-muted">Sem imagem</div>
        @endif
    </div>

    <h1 class="text-center">{{ $autor->nome }}</h1>

    <p class="text-center"><strong>Nacionalidade:</strong> {{ $autor->nacionalidade }}</p>

    <hr>

    <h4>Livros</h4>

    @forelse($autor->livros as $livro)
        <p class="mb-1">📚 {{ $livro->titulo }}</p>
    @empty
        <p class="text-muted">Nenhum livro cadastrado</p>
    @endforelse

    <a href="{{ route('autores.index') }}" class="btn btn-secondary mt-3">Voltar</a>

</div>

@endsection

chart:
@extends('layout')

@section('conteudo')

<div class="container mt-4 mb-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📊 Gráfico de Autores</h2>

        <a href="{{ route('autores.index') }}" class="btn btn-secondary">
            ← Voltar
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-4 p-4">
        {!! $grafico->container() !!}
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{ $grafico->script() }}

@endsection


manda completo pra avaliacoes e sagas