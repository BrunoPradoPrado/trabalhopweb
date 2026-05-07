<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Avaliacao;

class AvaliacaoSeeder extends Seeder
{
    public function run(): void
    {
        Avaliacao::factory(120)->create();
    }
}