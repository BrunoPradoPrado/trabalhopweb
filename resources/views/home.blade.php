@extends('layout')

@section('conteudo')

<h1>Sistema de Biblioteca</h1>

<p>Projeto desenvolvido em Laravel para gerenciamento de livros.</p>

<div class="row">

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Autores</h5>
                <p>Gerenciar autores cadastrados.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Categorias</h5>
                <p>Gerenciar categorias de livros.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Livros</h5>
                <p>Gerenciar livros da biblioteca.</p>
            </div>
        </div>
    </div>

</div>

@endsection