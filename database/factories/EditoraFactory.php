<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Editora>
 */
class EditoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
        {
            return [
                'nome' => fake()->company(),
                'cidade' => fake()->city(),
                'ano_fundacao' => fake()->numberBetween(1900, 2020)
            ];
        }
}
