<h1>Editar Autor</h1>

<form action="{{ route('autores.update', $autor->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="nome" value="{{ $autor->nome }}" required>
    <input type="text" name="nacionalidade" value="{{ $autor->nacionalidade }}" required>

    @if($autor->imagem)
        <p>Imagem atual:</p>
        <img src="{{ asset('storage/' . $autor->imagem) }}" width="100">
    @endif

    <input type="file" name="imagem">

    <button type="submit">Atualizar</button>
</form>