@extends('layout')

@section('conteudo')

<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('autores.index') }}" class="btn-ghost btn-icon-only">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div>
        <h1 class="section-heading"><i class="bi bi-person-badge"></i> Novo Autor</h1>
        <p class="section-sub">Cadastre um novo escritor no sistema</p>
    </div>
</div>

<div class="lib-card" style="max-width:540px;">
    <div class="lib-card-header">
        <span class="lib-card-title">Dados do Autor</span>
    </div>
    <div class="p-4">
        <form action="{{ route('autores.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="lib-label">Nome completo</label>
                <input type="text" name="nome" class="lib-input" value="{{ old('nome') }}" placeholder="Ex.: Machado de Assis" required>
            </div>

            <div class="mb-4">
                <label class="lib-label">Nacionalidade</label>
                <input type="text" name="nacionalidade" class="lib-input" value="{{ old('nacionalidade') }}" placeholder="Ex.: Brasileiro" required>
            </div>

            <div class="mb-5">
                <label class="lib-label">Foto (opcional)</label>
                <div class="upload-zone" id="uploadZone">
                    <i class="bi bi-cloud-arrow-up" style="font-size:1.8rem; color:var(--mist);"></i>
                    <p style="margin:8px 0 4px; font-size:.88rem; color:var(--mist);">Clique ou arraste uma imagem aqui</p>
                    <p style="margin:0; font-size:.75rem; color:var(--border);">JPG, PNG, WEBP</p>
                    <input type="file" name="imagem" accept="image/*" id="imgInput" style="position:absolute;inset:0;opacity:0;cursor:pointer;">
                </div>
                <div id="imgPreview" style="display:none; margin-top:12px;">
                    <img id="previewEl" style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid var(--gold);">
                    <span style="font-size:.8rem;color:var(--mist); margin-left:10px;" id="imgName"></span>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn-sage">
                    <i class="bi bi-check-lg"></i> Salvar Autor
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

    .upload-zone {
        position: relative;
        border: 2px dashed var(--border);
        border-radius: 10px;
        padding: 28px;
        text-align: center;
        transition: border-color .2s, background .2s;
        cursor: pointer;
    }
    .upload-zone:hover, .upload-zone.drag { border-color:var(--gold); background:rgba(196,147,63,.04); }
</style>
@endpush

@push('scripts')
<script>
    const input = document.getElementById('imgInput');
    const preview = document.getElementById('imgPreview');
    const previewEl = document.getElementById('previewEl');
    const imgName = document.getElementById('imgName');
    const zone = document.getElementById('uploadZone');

    input.addEventListener('change', () => {
        if (input.files[0]) {
            previewEl.src = URL.createObjectURL(input.files[0]);
            imgName.textContent = input.files[0].name;
            preview.style.display = 'flex';
            preview.style.alignItems = 'center';
        }
    });

    zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('drag'); });
    zone.addEventListener('dragleave', () => zone.classList.remove('drag'));
    zone.addEventListener('drop', e => {
        e.preventDefault(); zone.classList.remove('drag');
        if (e.dataTransfer.files[0]) { input.files = e.dataTransfer.files; input.dispatchEvent(new Event('change')); }
    });
</script>
@endpush

@endsection