<h1>Editoras</h1>

@foreach($editoras as $editora)
<p>{{ $editora->nome }} - {{ $editora->cidade }}</p>
@endforeach