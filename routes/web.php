<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EditoraController;



Route::get('/teste', function () { return view('teste'); });
Route::get('/', function () { return view('home') ; });

Route::resource('autores', AutorController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('livros', LivroController::class);
Route::resource('editoras', EditoraController::class);