<h1>Nova Editora</h1>

<form action="{{ route('editoras.store') }}" method="POST">
    @csrf

    <input type="text" name="nome" placeholder="Nome" required>
    <input type="text" name="cidade" placeholder="Cidade" required>
    <input type="number" name="ano_fundacao" placeholder="Ano de fundação">

    <button type="submit">Salvar</button>
</form>