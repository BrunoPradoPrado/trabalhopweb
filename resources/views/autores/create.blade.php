<h1>Novo Autor</h1>

<form action="{{ route('autores.store') }}" method="POST">
    @csrf

    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="nacionalidade" placeholder="Nacionalidade">

    <button type="submit">Salvar</button>
</form>