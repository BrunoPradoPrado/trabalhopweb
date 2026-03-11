<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Editora;

class EditoraSeeder extends Seeder
{
    public function run(): void
    {
        Editora::factory(5)->create();
    }
}