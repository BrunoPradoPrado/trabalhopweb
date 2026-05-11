@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('livros.index') }}" class="btn-ghost btn-icon-only">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div>
        <h1 class="section-heading"><i class="bi bi-pencil"></i> Editar Livro</h1>
        <p class="section-sub">{{ $livro->titulo }}</p>
    </div>
</div>

@if($errors->any())
    <div class="lib-alert lib-alert-danger">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <div>
            @foreach($errors->all() as $erro)
                <div>{{ $erro }}</div>
            @endforeach
        </div>
    </div>
@endif

<div class="lib-card" style="max-width:640px;">
    <div class="lib-card-header">
        <span class="lib-card-title">Dados do Livro</span>
    </div>
    <div class="p-4">
        <form action="{{ route('livros.update', $livro->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="mb-4">
                    <label class="lib-label">Título</label>
                    <input type="text" name="titulo" class="lib-input" value="{{ old('titulo', $livro->titulo) }}" required>
                </div>

                <div class="mb-4">
                    <label class="lib-label">Ano de Publicação</label>
                    <input type="number" name="ano" class="lib-input" value="{{ old('ano', $livro->ano) }}" min="1000" max="{{ date('Y') }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="lib-label">Autor</label>
                <select name="autor_id" class="lib-input" required>
                    <option value="">— Selecione —</option>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}" {{ $autor->id == $livro->autor_id ? 'selected' : '' }}>
                            {{ $autor->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="lib-label">Categoria</label>
                <select name="categoria_id" class="lib-input" required>
                    <option value="">— Selecione —</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $livro->categoria_id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="lib-label">Editora</label>
                <select name="editora_id" class="lib-input" required>
                    <option value="">— Selecione —</option>
                    @foreach($editoras as $editora)
                        <option value="{{ $editora->id }}" {{ $editora->id == $livro->editora_id ? 'selected' : '' }}>
                            {{ $editora->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn-gold">
                    <i class="bi bi-check-lg"></i> Atualizar
                </button>
                <a href="{{ route('livros.index') }}" class="btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    .section-heading { font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; margin:0; display:flex; align-items:center; gap:10px; color:var(--ink); }
    .section-heading i { color:var(--gold); font-size:1.4rem; }
    .section-sub { color:var(--mist); font-size:.85rem; margin:4px 0 0 34px; }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:0 20px; }
    @media(max-width:560px){ .form-row { grid-template-columns:1fr; } }
</style>
@endpush

@endsection