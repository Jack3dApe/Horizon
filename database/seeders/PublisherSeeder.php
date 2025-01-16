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
            ['name' => 'Capcom', 'email' => 'contact@capcom.com'],
            ['name' => 'FromSoftware', 'email' => 'info@fromsoftware.jp'],
            ['name' => 'Nintendo', 'email' => 'support@nintendo.com'],
            ['name' => 'Ubisoft', 'email' => 'contact@ubisoft.com'],
            ['name' => 'EA', 'email' => 'help@ea.com'],
            ['name' => 'Activision', 'email' => 'support@activision.com'],
            ['name' => 'Square Enix', 'email' => 'contact@square-enix.com'],
            ['name' => 'Rockstar Games', 'email' => 'info@rockstargames.com'],
            ['name' => 'Bethesda', 'email' => 'support@bethesda.net'],
            ['name' => 'Blizzard', 'email' => 'help@blizzard.com'],
            ['name' => 'Sega', 'email' => 'contact@sega.com'],
            ['name' => 'Konami', 'email' => 'support@konami.com'],
            ['name' => 'CD Projekt Red', 'email' => 'info@cdprojektred.com'],
            ['name' => 'Bandai Namco', 'email' => 'contact@bandainamco.com'],
            ['name' => 'Sony Interactive', 'email' => 'support@sonyinteractive.com'],
            ['name' => 'Valve', 'email' => 'support@valvesoftware.com'],
            ['name' => 'Matt Makes Games', 'email' => 'mattmakesgames@support.com'],
            ['name' => 'Microsoft', 'email' => 'info@microsoft.com'],
            ['name' => 'Atlus', 'email' => 'info@atlus.com'],
            ['name' => 'Red Hook Studios', 'email' => 'info@aredhookstudios.com'],
            ['name' => 'Psyonix', 'email' => 'info@psyonix.com'],
            ['name' => 'Beat Games', 'email' => 'info@beatgames.com'],
            ['name' => 'Arc System Works', 'email' => 'info@arc.com'],
            ['name' => 'NetherRealm Studios', 'email' => 'info@netherrealm.com'],
            ['name' => 'MegaCrit', 'email' => 'info@MegaCrit.com'],








        ];

        foreach ($publishers as $publisher) {
            Publisher::create($publisher);
        }

        // Gera 10 publishers fictícios usando a Factory
        #Publisher::factory()->count(10)->create();
    }
}

