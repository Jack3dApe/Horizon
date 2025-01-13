<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Game;
use App\Models\Review;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;
    /**
     * Define the model's default state.
     *
     //* @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user' => User::inRandomOrder()->first()->id_user,
            'id_game' => Game::inRandomOrder()->first()->id_game,
            'is_positive' => $this->faker->boolean(70),
            'description' => $this->faker->paragraph(),
            'review_date' => $this->faker->dateTimeBetween('-4 years', 'now'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
