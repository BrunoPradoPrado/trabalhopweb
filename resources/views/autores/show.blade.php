<h1>{{ $autor->nome }}</h1>

@if($autor->imagem)
    <img src="{{ asset('storage/' . $autor->imagem) }}" width="150">
@endif

<p><strong>Nacionalidade:</strong> {{ $autor->nacionalidade }}</p>

<h3>Livros:</h3>

@forelse($autor->livros as $livro)
    <p>{{ $livro->titulo }}</p>
@empty
    <p>Nenhum livro cadastrado</p>
@endforelse

<a href="{{ route('autores.index') }}">Voltar</a>