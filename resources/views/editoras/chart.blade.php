@extends('layout')
@section('conteudo')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('editoras.index') }}" class="btn-ghost btn-icon-only"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h1 class="section-heading"><i class="bi bi-bar-chart-line"></i> Gráfico de Editoras</h1>
            <p class="section-sub">Livros por editora no acervo</p>
        </div>
    </div>
</div>
<div class="lib-card">
    <div class="lib-card-header"><span class="lib-card-title">Distribuição por Editora</span></div>
    <div class="p-4">{!! $grafico->container() !!}</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{ $grafico->script() }}
@push('styles')
<style>
.section-heading{font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;margin:0;display:flex;align-items:center;gap:10px;color:var(--ink);}
.section-heading i{color:var(--gold);font-size:1.4rem;}
.section-sub{color:var(--mist);font-size:.85rem;margin:4px 0 0 34px;}
</style>
@endpush
@endsection