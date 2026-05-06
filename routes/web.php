<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\UserController;



Route::get('/', function () { return view('home'); })->name('home');
Route::get('autores/report', [AutorController::class, 'report']);
Route::get('autores/chart', [AutorController::class, 'chart']);
Route::get('editoras/report', [EditoraController::class, 'report']);
Route::get('editoras/chart', [EditoraController::class, 'chart']);
Route::resource('autores', AutorController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('livros', LivroController::class);
Route::resource('editoras', EditoraController::class);