@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('autores.index') }}" class="btn-ghost btn-icon-only">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h1 class="section-heading"><i class="bi bi-person-badge"></i> Perfil do Autor</h1>
</div>

<div class="autor-layout">

    {{-- Profile card --}}
    <div class="lib-card autor-profile-card">
        <div class="autor-cover"></div>
        <div class="autor-profile-body">
            <div class="autor-avatar-wrap">
                @if($autor->imagem)
                    <img src="{{ asset('storage/' . $autor->imagem) }}" class="autor-avatar" alt="{{ $autor->nome }}">
                @else
                    <div class="autor-avatar-placeholder"><i class="bi bi-person"></i></div>
                @endif
            </div>
            <h2 class="autor-name">{{ $autor->nome }}</h2>
            <span class="lib-badge lib-badge-sage" style="font-size:.82rem; padding:5px 14px;">
                <i class="bi bi-geo-alt"></i> {{ $autor->nacionalidade }}
            </span>

            <div class="mt-4 d-flex gap-2 justify-content-center flex-wrap">
                <a href="{{ route('autores.edit', $autor->id) }}" class="btn-gold">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <a href="{{ route('autores.index') }}" class="btn-ghost">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>

    {{-- Books list --}}
    <div class="lib-card">
        <div class="lib-card-header">
            <span class="lib-card-title">
                <i class="bi bi-book" style="color:var(--gold);"></i>
                Livros de {{ $autor->nome }}
            </span>
            <span class="lib-badge lib-badge-mist">{{ $autor->livros->count() }} título(s)</span>
        </div>
        <div class="p-4">
            @forelse($autor->livros as $livro)
                <div class="livro-row">
                    <div class="livro-spine"></div>
                    <div>
                        <div class="fw-semibold" style="font-family:'Playfair Display',serif;">{{ $livro->titulo }}</div>
                        @if($livro->ano)
                            <small style="color:var(--mist);">{{ $livro->ano }}</small>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-4" style="color:var(--mist);">
                    <i class="bi bi-book" style="font-size:1.8rem;display:block;margin-bottom:8px;"></i>
                    Nenhum livro cadastrado para este autor
                </div>
            @endforelse
        </div>
    </div>

</div>

@push('styles')
<style>
    .section-heading { font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; margin:0; display:flex; align-items:center; gap:10px; color:var(--ink); }
    .section-heading i { color:var(--gold); font-size:1.4rem; }

    .autor-layout { display:grid; grid-template-columns:280px 1fr; gap:20px; align-items:start; }
    @media(max-width:700px){ .autor-layout { grid-template-columns:1fr; } }

    .autor-cover { height:80px; background:linear-gradient(135deg,var(--ink) 0%,#3d2a12 100%); }
    .autor-profile-body { padding:0 24px 28px; text-align:center; }
    .autor-avatar-wrap { margin-top:-46px; margin-bottom:14px; }
    .autor-avatar { width:90px; height:90px; border-radius:50%; object-fit:cover; border:4px solid #fff; box-shadow:0 4px 16px var(--shadow); }
    .autor-avatar-placeholder { width:90px; height:90px; border-radius:50%; background:var(--parch); border:4px solid #fff; display:flex; align-items:center; justify-content:center; font-size:2rem; color:var(--mist); margin:0 auto; }
    .autor-name { font-family:'Playfair Display',serif; font-size:1.3rem; font-weight:700; margin:0 0 8px; }

    .livro-row { display:flex; align-items:center; gap:14px; padding:12px 0; border-bottom:1px solid var(--border); }
    .livro-row:last-child { border-bottom:none; }
    .livro-spine { width:4px; height:40px; border-radius:2px; background:var(--gold); flex-shrink:0; }
</style>
@endpush

@endsection