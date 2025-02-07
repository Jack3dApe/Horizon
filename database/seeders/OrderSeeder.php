<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $users = User::inRandomOrder()->get();

        for ($i = 0; $i < 427; $i++) {
            $user = $users->random();

            Order::create([
                'id_user' => $user->id_user,
                'total_price' => $faker->randomFloat(2, 10, 500),
                'status' => $faker->randomElement(['pending', 'paid', 'cancelled']),
                'created_at' => $faker->dateTimeBetween('-3 months', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}
