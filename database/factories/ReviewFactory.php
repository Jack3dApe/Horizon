<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Game;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'id_user' => User::factory(), // Cria um User automaticamente
            //'id_game' => Game::factory(), // Cria um Game automaticamente
            'is_positive' => $this->faker->boolean,
            'description' => $this->faker->paragraph,
            'review_date' => $this->faker->date,
        ];
    }
}
