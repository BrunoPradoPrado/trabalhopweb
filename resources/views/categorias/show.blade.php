<h1>{{ $categoria->nome }}</h1>

<p><strong>Descrição:</strong> {{ $categoria->descricao }}</p>

<h3>Livros:</h3>

@foreach($categoria->livros as $livro)
    <p>{{ $livro->titulo }}</p>
@endforeach

<a href="{{ route('categorias.index') }}">Voltar</a>