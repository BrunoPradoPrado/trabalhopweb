<h1>Nova Editora</h1>

<form action="{{ route('editoras.store') }}" method="POST">
    @csrf

    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="cidade" placeholder="Cidade">

    <button type="submit">Salvar</button>
</form>