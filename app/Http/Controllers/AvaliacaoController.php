<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Livro;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $avaliacoes = Avaliacao::with('livro')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('titulo', 'like', "%{$search}%")
                        ->orWhere('comentario', 'like', "%{$search}%")
                        ->orWhere('origem', 'like', "%{$search}%")
                        ->orWhereHas('livro', function ($query) use ($search) {
                            $query->where('titulo', 'like', "%{$search}%");
                        });
                });
            })
            ->get();

        return view('avaliacoes.index', compact('avaliacoes', 'search'));
    }

    public function create()
    {
        $livros = Livro::all();

        return view('avaliacoes.create', compact('livros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'required|string',
            'titulo' => 'required|string',
            'recomendado' => 'required|boolean',
            'origem' => 'required|string',
            'livro_id' => 'required|exists:livros,id',
        ]);

        Avaliacao::create($request->all());

        return redirect()->route('avaliacoes.index')
            ->with('success', 'Avaliação criada com sucesso!');
    }

    public function show(string $id)
    {
        $avaliacao = Avaliacao::with('livro')->findOrFail($id);

        return view('avaliacoes.show', compact('avaliacao'));
    }

    public function edit(string $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        $livros = Livro::all();

        return view('avaliacoes.edit', compact('avaliacao', 'livros'));
    }

    public function update(Request $request, string $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        $request->validate([
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'required|string',
            'titulo' => 'required|string',
            'recomendado' => 'required|boolean',
            'origem' => 'required|string',
            'livro_id' => 'required|exists:livros,id',
        ]);

        $avaliacao->update($request->all());

        return redirect()->route('avaliacoes.index')
            ->with('success', 'Avaliação atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        $avaliacao->delete();

        return redirect()->route('avaliacoes.index')
            ->with('success', 'Avaliação removida!');
    }
}