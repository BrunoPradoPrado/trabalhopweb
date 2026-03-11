<h1>Livros</h1>

@foreach($livros as $livro)
<p>{{ $livro->titulo }} - {{ $livro->ano }}</p>
@endforeach