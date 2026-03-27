@extends('layout')

@section('conteudo')

<div class="text-center">
    <h1 class="mb-4">📚 Sistema de Biblioteca</h1>
    <p class="lead">Gerenciamento de livros, autores, categorias e editoras.</p>

    <div class="mt-4">
        <a href="{{ route('livros.index') }}" class="btn btn-primary me-2">Livros</a>
        <a href="{{ route('autores.index') }}" class="btn btn-success me-2">Autores</a>
        <a href="{{ route('categorias.index') }}" class="btn btn-warning me-2">Categorias</a>
        <a href="{{ route('editoras.index') }}" class="btn btn-info">Editoras</a>
    </div>
</div>

@endsection