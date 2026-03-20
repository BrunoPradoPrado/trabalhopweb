<h1>{{ $livro->titulo }}</h1>

<p><strong>Ano:</strong> {{ $livro->ano }}</p>
<p><strong>Autor:</strong> {{ $livro->autor->nome ?? '-' }}</p>
<p><strong>Categoria:</strong> {{ $livro->categoria->nome ?? '-' }}</p>
<p><strong>Editora:</strong> {{ $livro->editora->nome ?? '-' }}</p>

<a href="{{ route('livros.index') }}">Voltar</a>