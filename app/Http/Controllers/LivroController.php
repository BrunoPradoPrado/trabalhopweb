<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            $livros = \App\Models\Livro::with(['autor','categoria','editora'])->get();
            return view('livros.index', compact('livros'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            $autores = \App\Models\Autor::all();
            $categorias = \App\Models\Categoria::all();
            $editoras = \App\Models\Editora::all();

            return view('livros.create', compact('autores', 'categorias', 'editoras'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $request->validate([
                'titulo' => 'required',
                'autor_id' => 'required',
                'categoria_id' => 'required',
                'editora_id' => 'required',
            ]);

            \App\Models\Livro::create($request->all());

            return redirect()->route('livros.index');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
        {
            $livro = \App\Models\Livro::with(['autor','categoria','editora'])->findOrFail($id);

            return view('livros.show', compact('livro'));
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
        {
            $livro = \App\Models\Livro::findOrFail($id);

            $autores = \App\Models\Autor::all();
            $categorias = \App\Models\Categoria::all();
            $editoras = \App\Models\Editora::all();

            return view('livros.edit', compact('livro','autores','categorias','editoras'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
        {
            $livro = \App\Models\Livro::findOrFail($id);

            $livro->update($request->all());

            return redirect()->route('livros.index');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
        {
            $livro = \App\Models\Livro::findOrFail($id);
            $livro->delete();

            return redirect()->route('livros.index');
        }
}
