<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            $autores = \App\Models\Autor::all();
            return view('autores.index', compact('autores'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            return view('autores.create');
        }

    public function store(Request $request)
        {
            $request->validate([
                'nome' => 'required',
                'nacionalidade' => 'required',
            ]);

            \App\Models\Autor::create($request->all());

            return redirect()->route('autores.index');
        }

    public function show(string $id)
        {
            $autor = \App\Models\Autor::with('livros')->findOrFail($id);

            return view('autores.show', compact('autor'));
        }

    public function edit(string $id)
        {
            $autor = \App\Models\Autor::findOrFail($id);

            return view('autores.edit', compact('autor'));
        }

    public function update(Request $request, string $id)
        {
            $autor = \App\Models\Autor::findOrFail($id);

            $autor->update($request->all());

            return redirect()->route('autores.index');
        }

    public function destroy(string $id)
        {
            $autor = \App\Models\Autor::findOrFail($id);

            if ($autor->livros()->count() > 0) {
                return redirect()->route('autores.index')
                    ->with('erro', 'Não é possível apagar o autor, pois já existem livros vinculados a ele.');
            }

            $autor->delete();

            return redirect()->route('autores.index');
        }
}