<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Publisher;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_publisher' => Publisher::factory(), // Cria um Publisher automaticamente
            'category' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 5, 100),
            'name' => $this->faker->sentence(3),
        ];
    }
}
