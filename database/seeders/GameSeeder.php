<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;
use App\Models\Genre;
use App\Models\Game;

class GameSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'name' => 'Resident Evil 4',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2005-01-11',
                'icon' => 'resident_evil_4.png',
                'banner' => 'resident_evil_4.png',
                'grid' => 'resident_evil_4.png',
                'genres' => ['Horror', 'Adventure', 'Survival']
            ],
            [
                'name' => 'Street Fighter V',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2016-02-16',
                'icon' => 'street_fighter_5.png',
                'banner' => 'street_fighter_5.png',
                'grid' => 'street_fighter_5.png',
                'genres' => ['Fighting', 'Multiplayer', 'Sports']
            ],
            [
                'name' => 'Devil May Cry 5',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2019-03-08',
                'icon' => 'devil_may_cry_5.png',
                'banner' => 'devil_may_cry_5.png',
                'grid' => 'devil_may_cry_5.png',
                'genres' => ['Action', 'Adventure', 'Hack and Slash']
            ],

            // FromSoftware
            [
                'name' => 'Sekiro: Shadows Die Twice',
                'id_publisher' => Publisher::where('name', 'FromSoftware')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2019-03-22',
                'icon' => 'sekiro.png',
                'banner' => 'sekiro.png',
                'grid' => 'sekiro.png',
                'genres' => ['Action', 'Adventure', 'RPG', 'Stealth']
            ],
            [
                'name' => 'Elden Ring',
                'id_publisher' => Publisher::where('name', 'FromSoftware')->first()->id_publisher,
                'price' => 69.99,
                'release_date' => '2022-02-25',
                'icon' => 'elden_ring.png',
                'banner' => 'elden_ring.png',
                'grid' => 'elden_ring.png',
                'genres' => ['RPG', 'Adventure', 'Action', 'Open World']
            ],
            [
                'name' => 'Bloodborne',
                'id_publisher' => Publisher::where('name', 'FromSoftware')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2015-03-24',
                'icon' => 'bloodborne.png',
                'banner' => 'bloodborne.png',
                'grid' => 'bloodborne.png',
                'genres' => ['RPG', 'Adventure', 'Horror', 'Action']
            ],

            // Nintendo
            [
                'name' => 'Super Mario Odyssey',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2017-10-27',
                'icon' => 'super_mario_odyssey.png',
                'banner' => 'super_mario_odyssey.png',
                'grid' => 'super_mario_odyssey.png',
                'genres' => ['Adventure', 'Platformer', 'Puzzle']
            ],
            [
                'name' => 'The Legend of Zelda: Ocarina of Time',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '1998-11-21',
                'icon' => 'zelda_ocarina.png',
                'banner' => 'zelda_ocarina.png',
                'grid' => 'zelda_ocarina.png',
                'genres' => ['Adventure', 'Puzzle', 'RPG']
            ],
            [
                'name' => 'Pokemon Red and Blue',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '1996-02-27',
                'icon' => 'pokemon_red_blue.png',
                'banner' => 'pokemon_red_blue.png',
                'grid' => 'pokemon_red_blue.png',
                'genres' => ['RPG', 'Adventure', 'Strategy']
            ],

            // Ubisoft
            [
                'name' => 'Far Cry 5',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2018-03-27',
                'icon' => 'far_cry_5.png',
                'banner' => 'far_cry_5.png',
                'grid' => 'far_cry_5.png',
                'genres' => ['FPS', 'Adventure', 'Open World', 'RPG']
            ],
            [
                'name' => 'Watch Dogs 2',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2016-11-15',
                'icon' => 'watch_dogs_2.png',
                'banner' => 'watch_dogs_2.png',
                'grid' => 'watch_dogs_2.png',
                'genres' => ['Adventure', 'Open World', 'Action', 'Stealth']
            ],
            [
                'name' => 'Tom Clancy\'s Rainbow Six Siege',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2015-12-01',
                'icon' => 'rainbow_six_siege.png',
                'banner' => 'rainbow_six_siege.png',
                'grid' => 'rainbow_six_siege.png',
                'genres' => ['FPS', 'Strategy', 'Multiplayer', 'Stealth']
            ],

            // EA
            [
                'name' => 'Battlefield 2042',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2021-11-19',
                'icon' => 'battlefield_2042.png',
                'banner' => 'battlefield_2042.png',
                'grid' => 'battlefield_2042.png',
                'genres' => ['FPS', 'Strategy', 'Action']
            ],
            [
                'name' => 'The Sims 4',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2014-09-02',
                'icon' => 'sims_4.png',
                'banner' => 'sims_4.png',
                'grid' => 'sims_4.png',
                'genres' => ['Simulation', 'Strategy', 'Open World']
            ],
            [
                'name' => 'Apex Legends',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 0.00,
                'release_date' => '2019-02-04',
                'icon' => 'apex_legends.png',
                'banner' => 'apex_legends.png',
                'grid' => 'apex_legends.png',
                'genres' => ['FPS', 'Battle Royale', 'Action', 'Multiplayer']
            ],
            [
                'name' => 'Monster Hunter World',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2018-01-26',
                'icon' => 'monster_hunter_world.png',
                'banner' => 'monster_hunter_world.png',
                'grid' => 'monster_hunter_world.png',
                'genres' => ['RPG', 'Adventure']
            ],
            [
                'name' => 'Dark Souls III',
                'id_publisher' => Publisher::where('name', 'FromSoftware')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2016-03-24',
                'icon' => 'dark_souls_3.png',
                'banner' => 'dark_souls_3.png',
                'grid' => 'dark_souls_3.png',
                'genres' => ['RPG', 'Adventure', 'Horror']
            ],
            [
                'name' => 'The Legend of Zelda: Breath of the Wild',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 69.99,
                'release_date' => '2017-03-03',
                'icon' => 'zelda_botw.png',
                'banner' => 'zelda_botw.png',
                'grid' => 'zelda_botw.png',
                'genres' => ['Adventure', 'Puzzle']
            ],
            [
                'name' => 'Assassin\'s Creed Valhalla',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2020-11-10',
                'icon' => 'ac_valhalla.png',
                'banner' => 'ac_valhalla.png',
                'grid' => 'ac_valhalla.png',
                'genres' => ['Adventure', 'RPG', 'Stealth']
            ],


        ];

        foreach ($games as $gameGenres) {
            $genres = $gameGenres['genres'];
            unset($gameGenres['genres']);

            $game = Game::create($gameGenres);

            // Associar os genres à tabela pivot
            $id_genre = Genre::whereIn('name', $genres)->pluck('id_genre');
            $game->genres()->sync($id_genre);
        }
    }
}
