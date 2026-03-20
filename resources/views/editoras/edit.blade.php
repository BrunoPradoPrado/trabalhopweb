<h1>Editar Editora</h1>

<form action="{{ route('editoras.update', $editora->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nome" value="{{ $editora->nome }}" required>
    <input type="text" name="cidade" value="{{ $editora->cidade }}" required>
    <input type="number" name="ano_fundacao" value="{{ $editora->ano_fundacao }}">

    <button type="submit">Atualizar</button>
</form>