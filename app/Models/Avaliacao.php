<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';

    protected $fillable = [
        'nota',
        'comentario',
        'titulo',
        'recomendado',
        'origem',
        'livro_id'
    ];

    public function livro()
    {
        return $this->belongsTo(\App\Models\Livro::class);
    }
}