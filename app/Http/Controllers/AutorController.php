<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AutorController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Autor::query();

        if ($request->filled('busca')) {
            $busca = $request->busca;

            $query->where('nome', 'like', "%{$busca}%");
        }

        $query->orderBy('nome');

        $autores = $query->get();

        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'nacionalidade' => 'required',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $dados = $request->only(['nome', 'nacionalidade']);

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('autores', 'public');
        } else {
            $dados['imagem'] = 'autores/default.png';
        }

        \App\Models\Autor::create($dados);

        return redirect()->route('autores.index')
            ->with('success', 'Autor criado com sucesso!');
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

        $request->validate([
            'nome' => 'required',
            'nacionalidade' => 'required',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $dados = $request->only(['nome', 'nacionalidade']);

        if ($request->hasFile('imagem')) {

            // remove imagem antiga (se não for a default)
            if ($autor->imagem && $autor->imagem !== 'autores/default.png') {
                Storage::disk('public')->delete($autor->imagem);
            }

            $dados['imagem'] = $request->file('imagem')->store('autores', 'public');
        }

        $autor->update($dados);

        return redirect()->route('autores.index')
            ->with('success', 'Autor atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $autor = \App\Models\Autor::findOrFail($id);

        if ($autor->livros()->count() > 0) {
            return redirect()->route('autores.index')
                ->with('erro', 'Não é possível apagar o autor, pois já existem livros vinculados a ele.');
        }

        // remove imagem (se não for default)
        if ($autor->imagem && $autor->imagem !== 'autores/default.png') {
            Storage::disk('public')->delete($autor->imagem);
        }

        $autor->delete();

        return redirect()->route('autores.index');
    }
}