<h1>Novo Livro</h1>

<a href="{{ route('livros.index') }}">Voltar</a>

@if($errors->any())
    <div>
        @foreach($errors->all() as $erro)
            <p>{{ $erro }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('livros.store') }}" method="POST">
    @csrf

    <div>
        <label>Título:</label>
        <input type="text" name="titulo" value="{{ old('titulo') }}">
    </div>

    <div>
        <label>Autor:</label>
        <select name="autor_id">
            @foreach($autores as $autor)
                <option value="{{ $autor->id }}">
                    {{ $autor->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Categoria:</label>
        <select name="categoria_id">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Editora:</label>
        <select name="editora_id">
            @foreach($editoras as $editora)
                <option value="{{ $editora->id }}">
                    {{ $editora->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Salvar</button>
</form>