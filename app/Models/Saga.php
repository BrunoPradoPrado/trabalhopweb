<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saga extends Model
{
    use HasFactory;

    protected $table = 'sagas';

    protected $fillable = [
        'nome',
        'descricao',
        'quantidade_livros',
        'ano_inicio'
    ];

    public function livros()
    {
        return $this->hasMany(\App\Models\Livro::class);
    }
}