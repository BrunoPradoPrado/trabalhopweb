<h1>Novo Autor</h1>

<form action="{{ route('autores.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="nome" placeholder="Nome" required>
    <input type="text" name="nacionalidade" placeholder="Nacionalidade" required>

    <input type="file" name="imagem">

    <button type="submit">Salvar</button>
</form>