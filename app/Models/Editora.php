<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    use HasFactory;

    protected $table = 'editoras';

    protected $fillable = ['nome', 'cidade'];

    public function livros()
    {
        return $this->hasMany(\App\Models\Livro::class);
    }
}