<h1>Editar Categoria</h1>

<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nome" value="{{ $categoria->nome }}">
    <input type="text" name="descricao" value="{{ $categoria->descricao }}">

    <button type="submit">Atualizar</button>
</form>