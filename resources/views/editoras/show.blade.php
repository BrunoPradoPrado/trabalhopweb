<h1>{{ $editora->nome }}</h1>

<p><strong>Cidade:</strong> {{ $editora->cidade }}</p>
<p><strong>Ano de fundação:</strong> {{ $editora->ano_fundacao ?? '-' }}</p>

<h3>Livros:</h3>

@foreach($editora->livros as $livro)
    <p>{{ $livro->titulo }}</p>
@endforeach

<a href="{{ route('editoras.index') }}">Voltar</a>