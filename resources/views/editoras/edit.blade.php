<h1>Editar Editora</h1>

<form action="{{ route('editoras.update', $editora->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nome" value="{{ $editora->nome }}">
    <input type="text" name="cidade" value="{{ $editora->cidade }}">

    <button type="submit">Atualizar</button>
</form>