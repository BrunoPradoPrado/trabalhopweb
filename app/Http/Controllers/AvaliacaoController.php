<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function index(Request $request)
    {
        $avaliacoes = Avaliacao::with('livro')->get();

        return view('avaliacoes.index', compact('avaliacoes'));
    }

    public function create()
    {
        $livros = Livro::all();
        $usuarios = User::all();

        return view('avaliacoes.create', compact('livros', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable',
            'titulo' => 'nullable',
            'recomendado' => 'nullable',
            'origem' => 'nullable',
            'livro_id' => 'required|exists:livros,id',
            'usuario_id' => 'required|exists:users,id'
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
        $usuarios = User::all();

        return view('avaliacoes.edit', compact('avaliacao', 'livros', 'usuarios'));
    }

    public function update(Request $request, string $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        $request->validate([
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable',
            'titulo' => 'nullable',
            'recomendado' => 'nullable',
            'origem' => 'nullable',
            'livro_id' => 'required|exists:livros,id',
            'usuario_id' => 'required|exists:users,id'
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