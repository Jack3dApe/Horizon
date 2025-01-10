<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'RPG'],
            ['name' => 'Strategy'],
            ['name' => 'Adventure'],
            ['name' => 'Simulation'],
            ['name' => 'Horror'],
            ['name' => 'Platformer'],
            ['name' => 'Puzzle'],
            ['name' => 'Racing'],
            ['name' => 'Sports'],
            ['name' => 'Fighting'],
            ['name' => 'Stealth'],
            ['name' => 'Music'],
            ['name' => 'Survival'],
            ['name' => 'MMO'],
            ['name' => 'FPS']
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }

        #Genre::factory()->count(10)->create();
    }
}

