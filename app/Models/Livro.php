<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'autor_id',
        'categoria_id',
        'editora_id'
    ];

    public function autor()
    {
        return $this->belongsTo(\App\Models\Autor::class);
    }

    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class);
    }

    public function editora()
    {
        return $this->belongsTo(\App\Models\Editora::class);
    }
}