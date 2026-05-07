@extends('layout')

@section('conteudo')

<div class="home-hero text-center py-5 mb-5">
    <div class="hero-icon mb-3">
        <i class="bi bi-book-half"></i>
    </div>
    <h1 class="hero-title">Sistema de Biblioteca</h1>
    <p class="hero-sub">Gerencie livros, autores, editoras, categorias, sagas e avaliações em um só lugar.</p>
</div>

<div class="home-grid">

    <a href="{{ route('livros.index') }}" class="home-card">
        <div class="home-card-icon" style="background:#1a1208; color:#e8c97a;"><i class="bi bi-book"></i></div>
        <div class="home-card-body">
            <h3>Livros</h3>
            <p>Cadastre e gerencie o acervo completo</p>
        </div>
        <i class="bi bi-arrow-right home-card-arrow"></i>
    </a>

    <a href="{{ route('autores.index') }}" class="home-card">
        <div class="home-card-icon" style="background:#4a6741; color:#c8e8c4;"><i class="bi bi-person-badge"></i></div>
        <div class="home-card-body">
            <h3>Autores</h3>
            <p>Perfis e bibliografias dos escritores</p>
        </div>
        <i class="bi bi-arrow-right home-card-arrow"></i>
    </a>

    <a href="{{ route('categorias.index') }}" class="home-card">
        <div class="home-card-icon" style="background:#6b4a1a; color:#f5d8a0;"><i class="bi bi-tag"></i></div>
        <div class="home-card-body">
            <h3>Categorias</h3>
            <p>Gêneros e classificações literárias</p>
        </div>
        <i class="bi bi-arrow-right home-card-arrow"></i>
    </a>

    <a href="{{ route('editoras.index') }}" class="home-card">
        <div class="home-card-icon" style="background:#2a4a6b; color:#a0c8f5;"><i class="bi bi-building"></i></div>
        <div class="home-card-body">
            <h3>Editoras</h3>
            <p>Casas editoriais e informações</p>
        </div>
        <i class="bi bi-arrow-right home-card-arrow"></i>
    </a>

    <a href="{{ route('sagas.index') }}" class="home-card">
        <div class="home-card-icon" style="background:#4a1a6b; color:#d4a0f5;"><i class="bi bi-collection"></i></div>
        <div class="home-card-body">
            <h3>Sagas</h3>
            <p>Séries e coleções de livros</p>
        </div>
        <i class="bi bi-arrow-right home-card-arrow"></i>
    </a>

    <a href="{{ route('avaliacoes.index') }}" class="home-card">
        <div class="home-card-icon" style="background:#6b1a1a; color:#f5a0a0;"><i class="bi bi-star"></i></div>
        <div class="home-card-body">
            <h3>Avaliações</h3>
            <p>Notas, resenhas e recomendações</p>
        </div>
        <i class="bi bi-arrow-right home-card-arrow"></i>
    </a>

</div>

@push('styles')
<style>
    .home-hero { max-width: 560px; margin: 0 auto; }

    .hero-icon {
        width: 72px; height: 72px;
        background: var(--ink);
        color: var(--gold);
        border-radius: 20px;
        display: flex; align-items: center; justify-content: center;
        font-size: 2rem;
        margin: 0 auto 18px;
        box-shadow: 0 8px 24px rgba(26,18,8,.18);
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.4rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: var(--ink);
    }

    .hero-sub {
        color: var(--mist);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .home-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 18px;
        max-width: 960px;
        margin: 0 auto;
    }

    .home-card {
        background: #fff;
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px;
        display: flex;
        align-items: center;
        gap: 18px;
        text-decoration: none;
        color: var(--ink);
        transition: transform .2s, box-shadow .2s, border-color .2s;
    }

    .home-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 28px var(--shadow);
        border-color: var(--gold);
        color: var(--ink);
    }

    .home-card-icon {
        width: 48px; height: 48px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .home-card-body { flex: 1; }

    .home-card-body h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem;
        font-weight: 700;
        margin: 0 0 4px;
    }

    .home-card-body p {
        font-size: .82rem;
        color: var(--mist);
        margin: 0;
    }

    .home-card-arrow {
        color: var(--border);
        font-size: 1rem;
        transition: color .2s, transform .2s;
    }

    .home-card:hover .home-card-arrow {
        color: var(--gold);
        transform: translateX(3px);
    }
</style>
@endpush

@endsection