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
}
