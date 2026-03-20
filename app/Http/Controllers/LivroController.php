<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Livro::with(['autor','categoria','editora']);

        if ($request->filled('busca')) {
            $busca = $request->busca;

            $query->where(function ($q) use ($busca) {
                $q->where('titulo', 'like', "%{$busca}%")
                  ->orWhereHas('autor', function ($q2) use ($busca) {
                      $q2->where('nome', 'like', "%{$busca}%");
                  })
                  ->orWhereHas('editora', function ($q2) use ($busca) {
                      $q2->where('nome', 'like', "%{$busca}%");
                  })
                  ->orWhereHas('categoria', function ($q2) use ($busca) {
                      $q2->where('nome', 'like', "%{$busca}%");
                  });
            });
        }

        $query->orderBy('titulo');

        $livros = $query->paginate(10)->withQueryString();

        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $autores = \App\Models\Autor::all();
        $categorias = \App\Models\Categoria::all();
        $editoras = \App\Models\Editora::all();

        return view('livros.create', compact('autores', 'categorias', 'editoras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'ano' => 'required|integer',
            'autor_id' => 'required',
            'categoria_id' => 'required',
            'editora_id' => 'required',
        ]);

        \App\Models\Livro::create($request->all());

        return redirect()->route('livros.index');
    }

    public function show(string $id)
    {
        $livro = \App\Models\Livro::with(['autor','categoria','editora'])->findOrFail($id);

        return view('livros.show', compact('livro'));
    }

    public function edit(string $id)
    {
        $livro = \App\Models\Livro::findOrFail($id);

        $autores = \App\Models\Autor::all();
        $categorias = \App\Models\Categoria::all();
        $editoras = \App\Models\Editora::all();

        return view('livros.edit', compact('livro','autores','categorias','editoras'));
    }

    public function update(Request $request, string $id)
    {
        $livro = \App\Models\Livro::findOrFail($id);

        $request->validate([
            'titulo' => 'required',
            'ano' => 'required|integer',
            'autor_id' => 'required',
            'categoria_id' => 'required',
            'editora_id' => 'required',
        ]);

        $livro->update($request->all());

        return redirect()->route('livros.index');
    }

    public function destroy(string $id)
    {
        $livro = \App\Models\Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livros.index');
    }
}