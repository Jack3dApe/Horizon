<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'id_publisher' => Publisher::factory(),
            'category' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 5, 100),
            'name' => $this->faker->sentence(3),
            'rating' => $this->faker->randomElement([
                'Overwhelmingly Positive', 'Very Positive', 'Positive',
                'Mixed', 'Negative', 'Overwhelmingly Negative'
            ]),
        ];
    }

}
