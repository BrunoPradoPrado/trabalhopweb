<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
        {
            $query = \App\Models\Categoria::query();

            if ($request->filled('busca')) {
                $busca = $request->busca;

                $query->where('nome', 'like', "%{$busca}%");
            }

            $query->orderBy('nome');
            
            $categorias = $query->get();

            return view('categorias.index', compact('categorias'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            return view('categorias.create');
        }

    public function store(Request $request)
        {
            $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
            ]);

            \App\Models\Categoria::create($request->all());

            return redirect()->route('categorias.index');
        }

    public function show(string $id)
        {
            $categoria = \App\Models\Categoria::with('livros')->findOrFail($id);

            return view('categorias.show', compact('categoria'));
        }

    public function edit(string $id)
        {
            $categoria = \App\Models\Categoria::findOrFail($id);

            return view('categorias.edit', compact('categoria'));
        }

    public function update(Request $request, string $id)
        {
            $categoria = \App\Models\Categoria::findOrFail($id);

            $categoria->update($request->all());

            return redirect()->route('categorias.index');
        }

    public function destroy(string $id)
        {
            $categoria = \App\Models\Categoria::findOrFail($id);

            if ($categoria->livros()->count() > 0) {
                return redirect()->route('categorias.index')
                    ->with('erro', 'Não é possível apagar a categoria, pois já existem livros vinculados a ela.');
            }

            $categoria->delete();

            return redirect()->route('categorias.index');
        }
}
