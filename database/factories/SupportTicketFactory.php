<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupportTicket>
 */
class SupportTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => User::factory(), // Cria um User automaticamente
            'issue_description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['Open', 'In Progress', 'Closed']),
            'creation_date' => $this->faker->date,
            'resolution_date' => $this->faker->optional()->date, // Pode ser nulo
        ];
    }
}
