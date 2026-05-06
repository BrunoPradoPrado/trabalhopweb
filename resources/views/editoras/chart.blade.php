@extends('layout')

@section('conteudo')

<div class="container mt-4 mb-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📊 Gráfico de Editoras</h2>

        <a href="{{ route('editoras.index') }}" class="btn btn-secondary">
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