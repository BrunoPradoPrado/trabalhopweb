<?php

namespace Database\Factories;

use App\Models\Livro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avaliacao>
 */
class AvaliacaoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nota' => fake()->numberBetween(1, 5),
            'comentario' => fake()->paragraph(),
            'titulo' => fake()->sentence(3),
            'recomendado' => fake()->boolean(),
            'origem' => fake()->randomElement(['Goodreads', 'Skoob', 'Blog', 'Amigo']),
            'livro_id' => Livro::inRandomOrder()->first()?->id,
        ];
    }
}