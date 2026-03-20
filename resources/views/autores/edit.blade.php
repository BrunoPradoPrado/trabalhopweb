<h1>Editar Autor</h1>

<form action="{{ route('autores.update', $autor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nome" value="{{ $autor->nome }}">
    <input type="text" name="nacionalidade" value="{{ $autor->nacionalidade }}">

    <button type="submit">Atualizar</button>
</form>