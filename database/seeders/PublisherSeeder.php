<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $publishers = [
            ['name' => 'Capcom', 'numOfGames' => 45, 'email' => 'contact@capcom.com'],
            ['name' => 'FromSoftware', 'numOfGames' => 12, 'email' => 'info@fromsoftware.jp'],
            ['name' => 'Nintendo', 'numOfGames' => 50, 'email' => 'support@nintendo.com'],
            ['name' => 'Ubisoft', 'numOfGames' => 38, 'email' => 'contact@ubisoft.com'],
            ['name' => 'EA', 'numOfGames' => 47, 'email' => 'help@ea.com'],
            ['name' => 'Activision', 'numOfGames' => 25, 'email' => 'support@activision.com'],
            ['name' => 'Square Enix', 'numOfGames' => 33, 'email' => 'contact@square-enix.com'],
            ['name' => 'Rockstar Games', 'numOfGames' => 15, 'email' => 'info@rockstargames.com'],
            ['name' => 'Bethesda', 'numOfGames' => 20, 'email' => 'support@bethesda.net'],
            ['name' => 'Blizzard', 'numOfGames' => 18, 'email' => 'help@blizzard.com'],
            ['name' => 'Sega', 'numOfGames' => 30, 'email' => 'contact@sega.com'],
            ['name' => 'Konami', 'numOfGames' => 40, 'email' => 'support@konami.com'],
            ['name' => 'CD Projekt Red', 'numOfGames' => 8, 'email' => 'info@cdprojektred.com'],
            ['name' => 'Bandai Namco', 'numOfGames' => 35, 'email' => 'contact@bandainamco.com'],
            ['name' => 'Sony Interactive', 'numOfGames' => 50, 'email' => 'support@sonyinteractive.com'],
        ];

        foreach ($publishers as $publisher) {
            Publisher::create($publisher);
        }

        // Gera 10 publishers fictícios usando a Factory
        #Publisher::factory()->count(10)->create();
    }
}

