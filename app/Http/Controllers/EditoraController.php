<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditoraController extends Controller
{
    public function index(Request $request)
        {
            $query = \App\Models\Editora::query();

            if ($request->filled('busca')) {
                $busca = $request->busca;

                $query->where('nome', 'like', "%{$busca}%");
            }

            $query->orderBy('nome');
            
            $editoras = $query->get();

            return view('editoras.index', compact('editoras'));
        }
    
    public function create()
        {
            return view('editoras.create');
        }

    public function store(Request $request)
        {
            $request->validate([
                'nome' => 'required',
                'cidade' => 'required',
                'ano_fundacao' => 'nullable|integer'
            ]);

            \App\Models\Editora::create($request->only([
                'nome',
                'cidade',
                'ano_fundacao'
            ]));

            return redirect()->route('editoras.index');
        }

    public function show(string $id)
        {
            $editora = \App\Models\Editora::with('livros')->findOrFail($id);

            return view('editoras.show', compact('editora'));
        }

    public function edit(string $id)
        {
            $editora = \App\Models\Editora::findOrFail($id);

            return view('editoras.edit', compact('editora'));
        }

    public function update(Request $request, string $id)
        {
            $editora = \App\Models\Editora::findOrFail($id);

            $request->validate([
                'nome' => 'required',
                'cidade' => 'required',
                'ano_fundacao' => 'nullable|integer'
            ]);

            $editora->update($request->only([
                'nome',
                'cidade',
                'ano_fundacao'
            ]));

            return redirect()->route('editoras.index');
        }

    public function destroy(string $id)
        {
            $editora = \App\Models\Editora::findOrFail($id);

            if ($editora->livros()->count() > 0) {
                return redirect()->route('editoras.index')
                    ->with('erro', 'Não é possível apagar a editora, pois já existem livros vinculados a ela.');
            }

            $editora->delete();

            return redirect()->route('editoras.index');
        }
}
