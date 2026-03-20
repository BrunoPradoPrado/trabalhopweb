<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditoraController extends Controller
{
    public function index()
        {
            $editoras = \App\Models\Editora::all();
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
            ]);

            \App\Models\Editora::create($request->all());

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

            $editora->update($request->all());

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
