<h1>Nova Categoria</h1>

<form action="{{ route('categorias.store') }}" method="POST">
    @csrf

    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="descricao" placeholder="Descrição">

    <button type="submit">Salvar</button>
</form>