<h1>{{ $autor->nome }}</h1>

<p><strong>Nacionalidade:</strong> {{ $autor->nacionalidade }}</p>

<h3>Livros:</h3>

@foreach($autor->livros as $livro)
    <p>{{ $livro->titulo }}</p>
@endforeach

<a href="{{ route('autores.index') }}">Voltar</a>