<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
        {
            return [
                'titulo' => fake()->sentence(3),
                'ano' => fake()->numberBetween(1900, 2024),
                'autor_id' => \App\Models\Autor::inRandomOrder()->first()->id,
                'categoria_id' => \App\Models\Categoria::inRandomOrder()->first()->id,
                'editora_id' => \App\Models\Editora::inRandomOrder()->first()->id
            ];
        }
}
