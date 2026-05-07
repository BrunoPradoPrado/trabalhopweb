@extends('layout')

@section('conteudo')

<div class="text-center">

    <h1 class="mb-4">📚 Sistema de Biblioteca</h1>

    <p class="lead">
        Gerenciamento de livros, autores, categorias, editoras, sagas e avaliações.
    </p>

    <div class="mt-4 d-flex flex-wrap justify-content-center gap-2">

        <a href="{{ route('livros.index') }}" class="btn btn-primary">
            Livros
        </a>

        <a href="{{ route('autores.index') }}" class="btn btn-success">
            Autores
        </a>

        <a href="{{ route('categorias.index') }}" class="btn btn-warning">
            Categorias
        </a>

        <a href="{{ route('editoras.index') }}" class="btn btn-info">
            Editoras
        </a>

        <a href="{{ route('sagas.index') }}" class="btn btn-dark">
            Sagas
        </a>

        <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary">
            Avaliações
        </a>

    </div>

</div>

@endsection