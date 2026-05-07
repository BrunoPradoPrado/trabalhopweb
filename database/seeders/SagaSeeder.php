<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Saga;

class SagaSeeder extends Seeder
{
    public function run(): void
    {
        Saga::factory(15)->create();
    }
}