<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Game;
use Faker\Factory as Faker;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $orders = Order::all();

        $remainingItems = 627;

        foreach ($orders as $order) {
            $itemsToCreate = rand(1, min($remainingItems, 5));

            $games = Game::inRandomOrder()->take($itemsToCreate)->get();

            foreach ($games as $game) {
                OrderItem::create([
                    'id_order' => $order->id_order,
                    'id_game' => $game->id_game,
                    'price' => $game->price,
                    'created_at' => $faker->dateTimeBetween($order->created_at, 'now'),
                    'updated_at' => now(),
                ]);
            }

            $remainingItems -= $itemsToCreate;

            if ($remainingItems <= 0) {
                break;
            }
        }
    }
}
