<?php

namespace App\Http\Controllers;

use App\Models\Saga;
use Illuminate\Http\Request;

class SagaController extends Controller
{
    public function index(Request $request)
    {
        $query = Saga::query();

        if ($request->filled('busca')) {
            $query->where('nome', 'like', "%{$request->busca}%");
        }

        $query->orderBy('nome');

        $sagas = $query->get();

        return view('sagas.index', compact('sagas'));
    }

    public function create()
    {
        return view('sagas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade_livros' => 'nullable|integer|min:0',
            'ano_inicio' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
        ]);

        Saga::create($request->all());

        return redirect()->route('sagas.index')
            ->with('success', 'Saga criada com sucesso!');
    }

    public function show(string $id)
    {
        $saga = Saga::with('livros')->findOrFail($id);

        return view('sagas.show', compact('saga'));
    }

    public function edit(string $id)
    {
        $saga = Saga::findOrFail($id);

        return view('sagas.edit', compact('saga'));
    }

    public function update(Request $request, string $id)
    {
        $saga = Saga::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade_livros' => 'nullable|integer|min:0',
            'ano_inicio' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
        ]);

        $saga->update($request->all());

        return redirect()->route('sagas.index')
            ->with('success', 'Saga atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $saga = Saga::findOrFail($id);

        if ($saga->livros()->count() > 0) {
            return redirect()->route('sagas.index')
                ->with('erro', 'Não é possível excluir a saga com livros vinculados.');
        }

        $saga->delete();

        return redirect()->route('sagas.index')
            ->with('success', 'Saga removida!');
    }
}