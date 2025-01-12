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
                'description' => 'A masterpiece of the survival horror genre, Resident Evil 4 combines intense action with an engaging storyline. Play as Leon S. Kennedy on a mission to rescue the president’s daughter in a perilous village.',
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
                'description' => 'A classic in the fighting game genre, Street Fighter V delivers dynamic battles and stunning visuals. Choose from legendary fighters and prove your skills in multiplayer mode.',
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
                'description' => 'Get ready for fast-paced action and unforgettable characters in Devil May Cry 5. Fight hordes of demons in style within a world packed with adrenaline-pumping battles.',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2019-03-08',
                'icon' => 'devil_may_cry_5.png',
                'banner' => 'devil_may_cry_5.png',
                'grid' => 'devil_may_cry_5.png',
                'genres' => ['Action', 'Adventure', 'Hack and Slash']
            ],
            [
                'name' => 'Sekiro: Shadows Die Twice',
                'description' => 'Step into a beautifully crafted world inspired by feudal Japan in Sekiro: Shadows Die Twice. Experience challenging combat and stealth mechanics in this gripping action RPG.',
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
                'description' => 'Venture into the vast open world of Elden Ring, a game that redefines the RPG experience. Discover breathtaking landscapes, challenging enemies, and a lore-rich universe.',
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
                'description' => 'Immerse yourself in the gothic horror world of Bloodborne, where danger lurks in every shadow. This action RPG combines thrilling combat with a deeply atmospheric setting.',
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
                'description' => 'Embark on an incredible journey with Mario as he travels across a variety of imaginative worlds in Super Mario Odyssey. From lush forests to bustling cities, use Mario’s new ally, Cappy, to take control of enemies, solve puzzles, and discover hidden treasures. This game redefines the platformer genre with its creative level design and endless charm, making it a must-play for players of all ages.',
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
                'description' => 'Step into the shoes of Link and embark on an epic quest in The Legend of Zelda: Ocarina of Time. Travel through time to save the kingdom of Hyrule from the evil Ganondorf, solve intricate puzzles, and explore dungeons brimming with danger. With its groundbreaking gameplay and captivating story, this classic set the standard for 3D action-adventure games and remains a beloved masterpiece.',
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
                'description' => 'Relive the adventure that started it all with Pokémon Red and Blue. Explore the Kanto region, capture and train a wide array of Pokémon, and battle your way to become the Pokémon Champion. With its addictive gameplay and iconic creatures, this classic RPG set the foundation for a beloved franchise that has captured the hearts of fans around the world.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '1996-02-27',
                'icon' => 'pokemon_red_blue.png',
                'banner' => 'pokemon_red_blue.png',
                'grid' => 'pokemon_red_blue.png',
                'genres' => ['RPG', 'Adventure', 'Strategy']
            ],
            [
                'name' => 'Far Cry 5',
                'description' => 'Far Cry 5 invites you to fight for freedom in the sprawling open world of Hope County, Montana. As a new deputy, you’ll take on the fanatical Eden’s Gate cult in a story filled with explosive action, rich characters, and breathtaking environments. With dynamic gameplay, cooperative multiplayer, and endless exploration, this game delivers a thrilling FPS experience.',
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
                'description' => 'Dive into the vibrant streets of San Francisco in Watch Dogs 2, a game that combines hacking, action, and open-world exploration. Play as Marcus Holloway, a skilled hacker working with the DedSec collective to expose corruption and take down a powerful surveillance system. With its rich narrative, fun gadgets, and cooperative multiplayer, Watch Dogs 2 redefines open-world adventures.',
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
                'description' => 'Experience tactical FPS action like never before in Tom Clancy’s Rainbow Six Siege. Engage in intense 5v5 multiplayer matches where strategy and teamwork are key to victory. With destructible environments, specialized operators, and constant updates, Rainbow Six Siege offers endless replayability for fans of competitive shooters.',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2015-12-01',
                'icon' => 'rainbow_six_siege.png',
                'banner' => 'rainbow_six_siege.png',
                'grid' => 'rainbow_six_siege.png',
                'genres' => ['FPS', 'Strategy', 'Multiplayer', 'Stealth']
            ],


            [
                'name' => 'Battlefield 2042',
                'description' => 'Step into the chaos of all-out warfare in Battlefield 2042. Featuring massive 128-player battles, dynamic weather systems, and futuristic weapons, this FPS redefines large-scale combat. Choose from a variety of specialists and shape the battlefield in ever-changing environments that challenge your strategic skills.',
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
                'description' => 'Unleash your creativity in The Sims 4, the ultimate life simulation game. Build and customize homes, create unique characters, and shape their lives through every decision. Whether you focus on storytelling or sandbox exploration, the possibilities in this open-world game are endless.',
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
                'description' => 'Apex Legends brings fast-paced, team-based action to the battle royale genre. Choose from a diverse roster of legends, each with unique abilities, and work together to dominate the competition. With dynamic maps, engaging combat, and constant updates, Apex Legends is a must-play multiplayer experience.',
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
                'description' => 'Embark on an epic adventure in Monster Hunter World, where you’ll hunt colossal creatures in breathtaking environments. Master weapons, craft gear, and team up with friends to tackle challenging quests. With its deep RPG elements and immersive world, this game offers hours of thrilling gameplay.',
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
                'description' => 'Dive into the haunting and unforgiving world of Dark Souls III. Known for its challenging combat and intricate level design, this action RPG delivers an unforgettable experience. Battle terrifying enemies, uncover hidden lore, and test your skills in this critically acclaimed dark fantasy masterpiece.',
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
                'description' => 'Explore the vast and stunning open world of Hyrule in The Legend of Zelda: Breath of the Wild. Solve puzzles, conquer dungeons, and uncover secrets in this groundbreaking adventure. With its open-ended gameplay and breathtaking visuals, this game redefines what an adventure game can be.',
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
                'description' => 'Live the saga of a Viking raider in Assassin’s Creed Valhalla. Explore England during the Dark Ages, build your settlement, and lead epic raids. With deep RPG mechanics and immersive storytelling, this game offers a rich and expansive adventure for fans of the series.',
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
