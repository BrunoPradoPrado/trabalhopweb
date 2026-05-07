<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Saga>
 */
class SagaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->unique()->sentence(2),
            'descricao' => fake()->paragraph(),
            'quantidade_livros' => fake()->numberBetween(1, 15),
            'ano_inicio' => fake()->year()
        ];
    }
}