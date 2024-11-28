<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            ['is_positive' => true,  'description' => 'Amazing game, had a lot of fun!', 'review_date' => '2023-01-15'],
            ['is_positive' => false, 'description' => 'Not what I expected, quite disappointing.', 'review_date' => '2023-02-20'],
            ['is_positive' => true,  'description' => 'Great storyline and characters.', 'review_date' => '2023-03-10'],
            ['is_positive' => true,  'description' => 'One of the best games of the year.', 'review_date' => '2023-04-12'],
            ['is_positive' => false, 'description' => 'Graphics are good, but gameplay is terrible.', 'review_date' => '2023-05-18'],
            ['is_positive' => true,  'description' => 'Loved it! Can’t wait for the sequel.', 'review_date' => '2023-06-22'],
            ['is_positive' => false, 'description' => 'Buggy and crashes constantly.', 'review_date' => '2023-07-01'],
            ['is_positive' => true,  'description' => 'A unique experience, highly recommended.', 'review_date' => '2023-08-10'],
            ['is_positive' => true,  'description' => 'Fantastic multiplayer mode.', 'review_date' => '2023-09-15'],
            ['is_positive' => false, 'description' => 'Unbalanced gameplay ruins the fun.', 'review_date' => '2023-10-20'],
            ['is_positive' => true,  'description' => 'A true masterpiece in gaming.', 'review_date' => '2023-11-05'],
            ['is_positive' => false, 'description' => 'Not worth the money.', 'review_date' => '2023-11-15'],
            ['is_positive' => true,  'description' => 'Innovative mechanics and stunning visuals.', 'review_date' => '2023-11-25'],
            ['is_positive' => false, 'description' => 'Lacks content for the price.', 'review_date' => '2023-11-27'],
            ['is_positive' => true,  'description' => 'A hidden gem, absolutely loved it.', 'review_date' => '2023-11-28'],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }

        // Cria 30 reviews usando a factory
        #Review::factory()->count(30)->create();
    }
}
