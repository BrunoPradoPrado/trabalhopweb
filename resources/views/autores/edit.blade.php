@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('autores.index') }}" class="btn-ghost btn-icon-only">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div>
        <h1 class="section-heading"><i class="bi bi-pencil"></i> Editar Autor</h1>
        <p class="section-sub">{{ $autor->nome }}</p>
    </div>
</div>

<div class="lib-card" style="max-width:540px;">
    <div class="lib-card-header">
        <span class="lib-card-title">Dados do Autor</span>
    </div>
    <div class="p-4">
        <form action="{{ route('autores.update', $autor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="lib-label">Nome completo</label>
                <input type="text" name="nome" class="lib-input" value="{{ old('nome', $autor->nome) }}" required>
            </div>

            <div class="mb-4">
                <label class="lib-label">Nacionalidade</label>
                <input type="text" name="nacionalidade" class="lib-input" value="{{ old('nacionalidade', $autor->nacionalidade) }}" required>
            </div>

            <div class="mb-5">
                <label class="lib-label">Foto</label>

                @if($autor->imagem)
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('storage/' . $autor->imagem) }}" style="width:64px;height:64px;border-radius:50%;object-fit:cover;border:3px solid var(--gold);">
                        <span style="font-size:.82rem; color:var(--mist);">Foto atual · envie uma nova para substituir</span>
                    </div>
                @endif

                <div class="upload-zone" id="uploadZone">
                    <i class="bi bi-cloud-arrow-up" style="font-size:1.6rem; color:var(--mist);"></i>
                    <p style="margin:6px 0 0; font-size:.85rem; color:var(--mist);">Clique ou arraste para trocar a foto</p>
                    <input type="file" name="imagem" accept="image/*" id="imgInput" style="position:absolute;inset:0;opacity:0;cursor:pointer;">
                </div>
                <div id="imgPreview" style="display:none; margin-top:10px; align-items:center; gap:10px;">
                    <img id="previewEl" style="width:64px;height:64px;border-radius:50%;object-fit:cover;border:3px solid var(--gold);">
                    <span style="font-size:.8rem;color:var(--mist);" id="imgName"></span>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn-gold">
                    <i class="bi bi-check-lg"></i> Atualizar
                </button>
                <a href="{{ route('autores.index') }}" class="btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    .section-heading { font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; margin:0; display:flex; align-items:center; gap:10px; color:var(--ink); }
    .section-heading i { color:var(--gold); font-size:1.4rem; }
    .section-sub { color:var(--mist); font-size:.85rem; margin:4px 0 0 34px; }
    .upload-zone { position:relative; border:2px dashed var(--border); border-radius:10px; padding:22px; text-align:center; transition:border-color .2s,background .2s; cursor:pointer; }
    .upload-zone:hover { border-color:var(--gold); background:rgba(196,147,63,.04); }
</style>
@endpush

@push('scripts')
<script>
    const input = document.getElementById('imgInput');
    const preview = document.getElementById('imgPreview');
    const previewEl = document.getElementById('previewEl');
    const imgName = document.getElementById('imgName');
    input.addEventListener('change', () => {
        if (input.files[0]) {
            previewEl.src = URL.createObjectURL(input.files[0]);
            imgName.textContent = input.files[0].name;
            preview.style.display = 'flex';
        }
    });
</script>
@endpush

@endsection