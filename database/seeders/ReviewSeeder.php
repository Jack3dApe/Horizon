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
        /*$reviews = [

        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }*/

        // Cria 30 reviews usando a factory
        Review::factory()->count(239)->create() ;
    }
}
