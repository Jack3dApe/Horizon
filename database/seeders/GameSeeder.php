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
                'description_en' => 'A masterpiece of the survival horror genre, Resident Evil 4 combines intense action with an engaging storyline. Play as Leon S. Kennedy on a mission to rescue the president’s daughter in a perilous village.',
                'description_pt' => 'Uma obra-prima do género survival horror, Resident Evil 4 combina ação intensa com uma história envolvente. Joga como Leon S. Kennedy numa missão para resgatar a filha do presidente numa vila perigosa.',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2005-01-11',
                'icon' => 'resident_evil_4.png',
                'banner' => 'resident_evil_4.png',
                'grid' => 'resident_evil_4.png',
                'logo' => 'resident_evil_4.png',
                'genres' => ['Horror', 'Adventure', 'Survival']
            ],
            [
                'name' => 'Street Fighter V',
                'description_en' => 'A classic in the fighting game genre, Street Fighter V delivers dynamic battles and stunning visuals. Choose from legendary fighters and prove your skills in multiplayer mode.',
                'description_pt' => 'Um clássico no género de jogos de luta, Street Fighter V oferece batalhas dinâmicas e visuais impressionantes. Escolhe entre lutadores lendários e prova as tuas habilidades no modo multijogador.',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2016-02-16',
                'icon' => 'street_fighter_5.png',
                'banner' => 'street_fighter_5.png',
                'grid' => 'street_fighter_5.png',
                'logo' => 'street_fighter_5.png',
                'genres' => ['Fighting', 'Multiplayer', 'Sports']
            ],
            [
                'name' => 'Devil May Cry 5',
                'description_en' => 'Get ready for fast-paced action and unforgettable characters in Devil May Cry 5. Fight hordes of demons in style within a world packed with adrenaline-pumping battles.',
                'description_pt' => 'Prepara-te para ação frenética e personagens inesquecíveis em Devil May Cry 5. Luta contra hordas de demónios com estilo num mundo repleto de batalhas eletrizantes.',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2019-03-08',
                'icon' => 'devil_may_cry_5.png',
                'banner' => 'devil_may_cry_5.png',
                'grid' => 'devil_may_cry_5.png',
                'logo' => 'devil_may_cry_5.png',
                'genres' => ['Action', 'Adventure', 'Hack and Slash']
            ],
            [
                'name' => 'Sekiro: Shadows Die Twice',
                'description_en' => 'Step into a beautifully crafted world inspired by feudal Japan in Sekiro: Shadows Die Twice. Experience challenging combat and stealth mechanics in this gripping action RPG.',
                'description_pt' => 'Entra num mundo lindamente criado, inspirado no Japão feudal, em Sekiro: Shadows Die Twice. Experimenta combates desafiantes e mecânicas de furtividade neste emocionante RPG de ação.',
                'id_publisher' => Publisher::where('name', 'FromSoftware')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2019-03-22',
                'icon' => 'sekiro.png',
                'banner' => 'sekiro.png',
                'grid' => 'sekiro.png',
                'logo' => 'sekiro.png',
                'genres' => ['Action', 'Adventure', 'RPG', 'Stealth']
            ],
            [
                'name' => 'Elden Ring',
                'description_en' => 'Venture into the vast open world of Elden Ring, a game that redefines the RPG experience. Discover breathtaking landscapes, challenging enemies, and a lore-rich universe.',
                'description_pt' => 'Aventura-te no vasto mundo aberto de Elden Ring, um jogo que redefine a experiência RPG. Descobre paisagens deslumbrantes, inimigos desafiantes e um universo rico em história.',
                'id_publisher' => Publisher::where('name', 'FromSoftware')->first()->id_publisher,
                'price' => 69.99,
                'release_date' => '2022-02-25',
                'icon' => 'elden_ring.png',
                'banner' => 'elden_ring.png',
                'grid' => 'elden_ring.png',
                'logo' => 'elden_ring.png',
                'genres' => ['RPG', 'Adventure', 'Action', 'Open World']
            ],
            [
                'name' => 'Bloodborne',
                'description_en' => 'Immerse yourself in the gothic horror world of Bloodborne, where danger lurks in every shadow. This action RPG combines thrilling combat with a deeply atmospheric setting.',
                'description_pt' => 'Mergulha no mundo de terror gótico de Bloodborne, onde o perigo espreita em cada sombra. Este RPG de ação combina combates emocionantes com um cenário profundamente atmosférico.',
                'id_publisher' => Publisher::where('name', 'FromSoftware')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2015-03-24',
                'icon' => 'bloodborne.png',
                'banner' => 'bloodborne.png',
                'grid' => 'bloodborne.png',
                'logo' => 'bloodborne.png',
                'genres' => ['RPG', 'Adventure', 'Horror', 'Action']
            ],

            // Nintendo
            [
                'name' => 'Super Mario Odyssey',
                'description_en' => 'Embark on an incredible journey with Mario as he travels across a variety of imaginative worlds in Super Mario Odyssey. From lush forests to bustling cities, use Mario’s new ally, Cappy, to take control of enemies, solve puzzles, and discover hidden treasures. This game redefines the platformer genre with its creative level design and endless charm, making it a must-play for players of all ages.',
                'description_pt' => 'Embarca numa jornada incrível com o Mario enquanto ele viaja por uma variedade de mundos imaginativos em Super Mario Odyssey. De florestas exuberantes a cidades movimentadas, usa o novo aliado do Mario, Cappy, para controlar inimigos, resolver enigmas e descobrir tesouros escondidos. Este jogo redefine o género de plataformas com o seu design criativo de níveis e charme infinito, tornando-se obrigatório para jogadores de todas as idades.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2017-10-27',
                'icon' => 'super_mario_odyssey.png',
                'banner' => 'super_mario_odyssey.png',
                'grid' => 'super_mario_odyssey.png',
                'logo' => 'super_mario_odyssey.png',
                'genres' => ['Adventure', 'Platformer', 'Puzzle']
            ],
            [
                'name' => 'The Legend of Zelda: Ocarina of Time',
                'description_en' => 'Step into the shoes of Link and embark on an epic quest in The Legend of Zelda: Ocarina of Time. Travel through time to save the kingdom of Hyrule from the evil Ganondorf, solve intricate puzzles, and explore dungeons brimming with danger. With its groundbreaking gameplay and captivating story, this classic set the standard for 3D action-adventure games and remains a beloved masterpiece.',
                'description_pt' => 'Assume o papel de Link e embarca numa jornada épica em The Legend of Zelda: Ocarina of Time. Viaja no tempo para salvar o reino de Hyrule do maligno Ganondorf, resolve enigmas intrincados e explora masmorras repletas de perigos. Com a sua jogabilidade inovadora e história cativante, este clássico estabeleceu o padrão para jogos de ação e aventura em 3D e continua a ser uma obra-prima amada.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '1998-11-21',
                'icon' => 'zelda_ocarina.png',
                'banner' => 'zelda_ocarina.png',
                'grid' => 'zelda_ocarina.png',
                'logo' => 'zelda_ocarina.png',
                'genres' => ['Adventure', 'Puzzle', 'RPG']
            ],
            [
                'name' => 'Far Cry 5',
                'description_en' => 'Far Cry 5 invites you to fight for freedom in the sprawling open world of Hope County, Montana. As a new deputy, you’ll take on the fanatical Eden’s Gate cult in a story filled with explosive action, rich characters, and breathtaking environments. With dynamic gameplay, cooperative multiplayer, and endless exploration, this game delivers a thrilling FPS experience.',
                'description_pt' => 'Far Cry 5 convida-te a lutar pela liberdade no vasto mundo aberto de Hope County, Montana. Como um novo delegado, enfrentarás o culto fanático Eden’s Gate numa história repleta de ação explosiva, personagens ricos e cenários deslumbrantes. Com uma jogabilidade dinâmica, multijogador cooperativo e exploração sem fim, este jogo oferece uma experiência emocionante de FPS.',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2018-03-27',
                'icon' => 'far_cry_5.png',
                'banner' => 'far_cry_5.png',
                'grid' => 'far_cry_5.png',
                'logo' => 'far_cry_5.png',
                'genres' => ['FPS', 'Adventure', 'Open World', 'RPG']
            ],

            [
                'name' => 'Watch Dogs 2',
                'description_en' => 'Dive into the vibrant streets of San Francisco in Watch Dogs 2, a game that combines hacking, action, and open-world exploration. Play as Marcus Holloway, a skilled hacker working with the DedSec collective to expose corruption and take down a powerful surveillance system. With its rich narrative, fun gadgets, and cooperative multiplayer, Watch Dogs 2 redefines open-world adventures.',
                'description_pt' => 'Mergulha nas vibrantes ruas de São Francisco em Watch Dogs 2, um jogo que combina hacking, ação e exploração de mundo aberto. Joga como Marcus Holloway, um hacker habilidoso que trabalha com o coletivo DedSec para expor a corrupção e derrubar um poderoso sistema de vigilância. Com uma narrativa rica, gadgets divertidos e multijogador cooperativo, Watch Dogs 2 redefine as aventuras em mundo aberto.',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2016-11-15',
                'icon' => 'watch_dogs_2.png',
                'banner' => 'watch_dogs_2.png',
                'grid' => 'watch_dogs_2.png',
                'logo' => 'watch_dogs_2.png',
                'genres' => ['Adventure', 'Open World', 'Action', 'Stealth']
            ],
            [
                'name' => 'Tom Clancy\'s Rainbow Six Siege',
                'description_en' => 'Experience tactical FPS action like never before in Tom Clancy’s Rainbow Six Siege. Engage in intense 5v5 multiplayer matches where strategy and teamwork are key to victory. With destructible environments, specialized operators, and constant updates, Rainbow Six Siege offers endless replayability for fans of competitive shooters.',
                'description_pt' => 'Experiencia ação tática de FPS como nunca antes em Tom Clancy’s Rainbow Six Siege. Participa em intensas partidas multijogador 5v5, onde estratégia e trabalho em equipa são fundamentais para a vitória. Com ambientes destrutíveis, operadores especializados e atualizações constantes, Rainbow Six Siege oferece uma rejogabilidade infinita para os fãs de jogos de tiro competitivos.',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2015-12-01',
                'icon' => 'rainbow_six_siege.png',
                'banner' => 'rainbow_six_siege.png',
                'grid' => 'rainbow_six_siege.png',
                'logo' => 'rainbow_six_siege.png',
                'genres' => ['FPS', 'Strategy', 'Multiplayer', 'Stealth']
            ],


            [
                'name' => 'Battlefield 2042',
                'description_en' => 'Step into the chaos of all-out warfare in Battlefield 2042. Featuring massive 128-player battles, dynamic weather systems, and futuristic weapons, this FPS redefines large-scale combat. Choose from a variety of specialists and shape the battlefield in ever-changing environments that challenge your strategic skills.',
                'description_pt' => 'Entra no caos da guerra total em Battlefield 2042. Com batalhas massivas para 128 jogadores, sistemas climáticos dinâmicos e armas futuristas, este FPS redefine o combate em grande escala. Escolhe entre uma variedade de especialistas e molda o campo de batalha em ambientes em constante mudança que desafiam as tuas habilidades estratégicas.',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2021-11-19',
                'icon' => 'battlefield_2042.png',
                'banner' => 'battlefield_2042.png',
                'grid' => 'battlefield_2042.png',
                'logo' => 'battlefield_2042.png',
                'genres' => ['FPS', 'Strategy', 'Action']
            ],
            [
                'name' => 'The Sims 4',
                'description_en' => 'Unleash your creativity in The Sims 4, the ultimate life simulation game. Build and customize homes, create unique characters, and shape their lives through every decision. Whether you focus on storytelling or sandbox exploration, the possibilities in this open-world game are endless.',
                'description_pt' => 'Liberta a tua criatividade em The Sims 4, o jogo definitivo de simulação de vida. Constrói e personaliza casas, cria personagens únicas e molda as suas vidas através de cada decisão. Quer te foques em contar histórias ou em explorar o modo sandbox, as possibilidades neste jogo de mundo aberto são infinitas.',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2014-09-02',
                'icon' => 'sims_4.png',
                'banner' => 'sims_4.png',
                'grid' => 'sims_4.png',
                'logo' => 'sims_4.png',
                'genres' => ['Simulation', 'Strategy', 'Open World']
            ],
            [
                'name' => 'Apex Legends',
                'description_en' => 'Apex Legends brings fast-paced, team-based action to the battle royale genre. Choose from a diverse roster of legends, each with unique abilities, and work together to dominate the competition. With dynamic maps, engaging combat, and constant updates, Apex Legends is a must-play multiplayer experience.',
                'description_pt' => 'Apex Legends traz ação rápida e baseada em equipa para o género battle royale. Escolhe entre uma lista diversificada de lendas, cada uma com habilidades únicas, e trabalha em equipa para dominar a competição. Com mapas dinâmicos, combates envolventes e atualizações constantes, Apex Legends é uma experiência multijogador imperdível.',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 0.00,
                'release_date' => '2019-02-04',
                'icon' => 'apex_legends.png',
                'banner' => 'apex_legends.png',
                'grid' => 'apex_legends.png',
                'logo' => 'apex_legends.png',
                'genres' => ['FPS', 'Battle Royale', 'Action', 'Multiplayer']
            ],
            [
                'name' => 'Monster Hunter World',
                'description_en' => 'Embark on an epic adventure in Monster Hunter World, where you’ll hunt colossal creatures in breathtaking environments. Master weapons, craft gear, and team up with friends to tackle challenging quests. With its deep RPG elements and immersive world, this game offers hours of thrilling gameplay.',
                'description_pt' => 'Embarca numa aventura épica em Monster Hunter World, onde irás caçar criaturas colossais em ambientes deslumbrantes. Domina armas, cria equipamentos e junta-te a amigos para enfrentar missões desafiadoras. Com profundos elementos de RPG e um mundo imersivo, este jogo oferece horas de jogabilidade emocionante.',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2018-01-26',
                'icon' => 'monster_hunter_world.png',
                'banner' => 'monster_hunter_world.png',
                'grid' => 'monster_hunter_world.png',
                'logo' => 'monster_hunter_world.png',
                'genres' => ['RPG', 'Adventure']
            ],
            [
                'name' => 'Dark Souls III',
                'description_en' => 'Dive into the haunting and unforgiving world of Dark Souls III. Known for its challenging combat and intricate level design, this action RPG delivers an unforgettable experience. Battle terrifying enemies, uncover hidden lore, and test your skills in this critically acclaimed dark fantasy masterpiece.',
                'description_pt' => 'Mergulha no mundo assombroso e implacável de Dark Souls III. Conhecido pelos seus combates desafiadores e design de níveis intrincados, este RPG de ação oferece uma experiência inesquecível. Enfrenta inimigos aterradores, descobre histórias ocultas e testa as tuas habilidades nesta aclamada obra-prima de fantasia sombria.',
                'id_publisher' => Publisher::where('name', 'FromSoftware')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2016-03-24',
                'icon' => 'dark_souls_3.png',
                'banner' => 'dark_souls_3.png',
                'grid' => 'dark_souls_3.png',
                'logo' => 'dark_souls_3.png',
                'genres' => ['RPG', 'Adventure', 'Horror']
            ],
            [
                'name' => 'The Legend of Zelda: Breath of the Wild',
                'description_en' => 'Explore the vast and stunning open world of Hyrule in The Legend of Zelda: Breath of the Wild. Solve puzzles, conquer dungeons, and uncover secrets in this groundbreaking adventure. With its open-ended gameplay and breathtaking visuals, this game redefines what an adventure game can be.',
                'description_pt' => 'Explora o vasto e deslumbrante mundo aberto de Hyrule em The Legend of Zelda: Breath of the Wild. Resolve enigmas, conquista masmorras e descobre segredos nesta aventura revolucionária. Com a sua jogabilidade aberta e visuais impressionantes, este jogo redefine o que um jogo de aventura pode ser.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 69.99,
                'release_date' => '2017-03-03',
                'icon' => 'zelda_botw.png',
                'banner' => 'zelda_botw.png',
                'grid' => 'zelda_botw.png',
                'logo' => 'zelda_botw.png',
                'genres' => ['Adventure', 'Puzzle']
            ],
            [
                'name' => 'Assassin\'s Creed Valhalla',
                'description_en' => 'Live the saga of a Viking raider in Assassin’s Creed Valhalla. Explore England during the Dark Ages, build your settlement, and lead epic raids. With deep RPG mechanics and immersive storytelling, this game offers a rich and expansive adventure for fans of the series.',
                'description_pt' => 'Vive a saga de um invasor viking em Assassin’s Creed Valhalla. Explora a Inglaterra durante a Idade das Trevas, constrói o teu assentamento e lidera ataques épicos. Com mecânicas de RPG profundas e uma narrativa imersiva, este jogo oferece uma aventura rica e expansiva para os fãs da série.',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2020-11-10',
                'icon' => 'ac_valhalla.png',
                'banner' => 'ac_valhalla.png',
                'grid' => 'ac_valhalla.png',
                'logo' => 'ac_valhalla.png',
                'genres' => ['Adventure', 'RPG', 'Stealth']
            ],

            [
                'name' => 'Celeste',
                'description_en' => 'Help Madeline survive her inner demons on her journey to the top of Celeste Mountain. This precision platformer features challenging levels, a heartfelt story, and unique mechanics.',
                'description_pt' => 'Ajuda a Madeline a enfrentar os seus demónios interiores na sua jornada até ao topo da Montanha Celeste. Este jogo de plataformas de precisão apresenta níveis desafiadores, uma história emocionante e mecânicas únicas.',
                'id_publisher' => Publisher::where('name', 'Matt Makes Games')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2018-01-25',
                'icon' => 'celeste.png',
                'banner' => 'celeste.png',
                'grid' => 'celeste.png',
                'logo' => 'celeste.png',
                'genres' => ['Platformer', 'Indie', 'Adventure']
            ],

            [
                'name' => 'Portal 2',
                'description_en' => 'Solve mind-bending puzzles and uncover the mysteries of Aperture Science in this critically acclaimed first-person puzzle-platform game. Use the portal gun to navigate and manipulate the environment.',
                'description_pt' => 'Resolve enigmas desafiantes e desvenda os mistérios da Aperture Science neste aclamado jogo de plataformas e puzzles em primeira pessoa. Usa a arma de portais para navegar e manipular o ambiente.',
                'id_publisher' => Publisher::where('name', 'Valve')->first()->id_publisher,
                'price' => 9.99,
                'release_date' => '2011-04-18',
                'icon' => 'portal2.png',
                'banner' => 'portal2.png',
                'grid' => 'portal2.png',
                'logo' => 'portal2.png',
                'genres' => ['Puzzle', 'Platformer']
            ],

            [
                'name' => 'Forza Horizon 5',
                'description_en' => 'Explore the vibrant and ever-evolving landscapes of Mexico in the ultimate open-world racing game. With a dynamic weather system and hundreds of cars, Forza Horizon 5 offers endless driving thrills.',
                'description_pt' => 'Explora as paisagens vibrantes e em constante evolução do México no derradeiro jogo de corridas em mundo aberto. Com um sistema meteorológico dinâmico e centenas de carros, Forza Horizon 5 oferece emoções de condução infinitas.',
                'id_publisher' => Publisher::where('name', 'Microsoft')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2021-11-09',
                'icon' => 'forza5.png',
                'banner' => 'forza5.png',
                'grid' => 'forza5.png',
                'logo' => 'forza5.png',
                'genres' => ['Racing', 'Simulation']
            ],

            [
                'name' => 'Chrono Cross',
                'description_en' => 'Chrono Cross is a classic RPG that takes players on a journey across parallel dimensions. Experience a deep storyline, innovative battle mechanics, and memorable characters in this timeless adventure.',
                'description_pt' => 'Chrono Cross é um RPG clássico que leva os jogadores numa jornada através de dimensões paralelas. Vive uma história profunda, mecânicas de combate inovadoras e personagens memoráveis nesta aventura intemporal.',
                'id_publisher' => Publisher::where('name', 'Square Enix')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2000-08-15',
                'icon' => 'chrono_cross.png',
                'banner' => 'chrono_cross.png',
                'grid' => 'chrono_cross.png',
                'logo' => 'chrono_cross.png',
                'genres' => ['RPG', 'Adventure', 'Classic']
            ],

            [
                'name' => 'Persona 5',
                'description_en' => 'Persona 5 is a critically acclaimed JRPG that follows the story of the Phantom Thieves as they fight corruption in modern Tokyo. With a unique blend of life simulation and dungeon crawling, this game is a masterpiece of storytelling and style.',
                'description_pt' => 'Persona 5 é um JRPG aclamado pela crítica que segue a história dos Phantom Thieves enquanto lutam contra a corrupção na Tóquio moderna. Com uma mistura única de simulação de vida e exploração de masmorras, este jogo é uma obra-prima de narrativa e estilo.',
                'id_publisher' => Publisher::where('name', 'Atlus')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2016-09-15',
                'icon' => 'persona_5.png',
                'banner' => 'persona_5.png',
                'grid' => 'persona_5.png',
                'logo' => 'persona_5.png',
                'genres' => ['RPG', 'Adventure', 'Simulation']
            ],

            [
                'name' => 'Slay the Spire',
                'description_en' => 'Slay the Spire is a roguelike deck-building game where players craft unique decks, encounter strange creatures, and discover powerful relics. Climb the spire in this challenging and addictive adventure.',
                'description_pt' => 'Slay the Spire é um jogo roguelike de construção de baralhos onde os jogadores criam baralhos únicos, enfrentam criaturas estranhas e descobrem relíquias poderosas. Escala a torre nesta aventura desafiante e viciante.',
                'id_publisher' => Publisher::where('name', 'MegaCrit')->first()->id_publisher,
                'price' => 24.99,
                'release_date' => '2019-01-23',
                'icon' => 'slay_the_spire.png',
                'banner' => 'slay_the_spire.png',
                'grid' => 'slay_the_spire.png',
                'logo' => 'slay_the_spire.png',
                'genres' => ['RPG', 'Card Games', 'Puzzle']
            ],

            [
                'name' => 'Darkest Dungeon',
                'description_en' => 'Darkest Dungeon is a challenging gothic roguelike RPG where players recruit and train a team of flawed heroes. Explore twisted dungeons, fight horrific monsters, and manage the ever-looming threat of stress and madness.',
                'description_pt' => 'Darkest Dungeon é um desafiante RPG roguelike gótico onde os jogadores recrutam e treinam uma equipa de heróis imperfeitos. Explora masmorras distorcidas, enfrenta monstros horríveis e gere a constante ameaça de stress e loucura.',
                'id_publisher' => Publisher::where('name', 'Red Hook Studios')->first()->id_publisher,
                'price' => 24.99,
                'release_date' => '2016-01-19',
                'icon' => 'darkest_dungeon.png',
                'banner' => 'darkest_dungeon.png',
                'grid' => 'darkest_dungeon.png',
                'logo' => 'darkest_dungeon.png',
                'genres' => ['RPG', 'Horror', 'Indie', 'Card Games']
            ],

            [
                'name' => 'Total War: Warhammer 3',
                'description_en' => 'Total War: Warhammer 3 is an epic strategy game that combines turn-based empire building with massive real-time battles. Choose your faction and lead your armies to victory in the climactic finale of the trilogy.',
                'description_pt' => 'Total War: Warhammer 3 é um épico jogo de estratégia que combina a construção de impérios por turnos com batalhas massivas em tempo real. Escolhe a tua facção e lidera os teus exércitos para a vitória no clímax final da trilogia.',
                'id_publisher' => Publisher::where('name', 'Sega')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2022-02-17',
                'icon' => 'total_war_warhammer_3.png',
                'banner' => 'total_war_warhammer_3.png',
                'grid' => 'total_war_warhammer_3.png',
                'logo' => 'total_war_warhammer_3.png',
                'genres' => ['Strategy', 'Simulation', 'RPG']
            ],

            [
                'name' => 'Rocket League',
                'description_en' => 'Rocket League is a high-octane hybrid of arcade-style soccer and vehicular mayhem. Score incredible goals and pull off insane saves in this physics-based multiplayer phenomenon.',
                'description_pt' => 'Rocket League é uma combinação de alta octanagem entre futebol em estilo arcade e caos automóvel. Marca golos incríveis e faz defesas espetaculares neste fenómeno multijogador baseado em física.',
                'id_publisher' => Publisher::where('name', 'Psyonix')->first()->id_publisher,
                'price' => 0.00,
                'release_date' => '2015-07-07',
                'icon' => 'rocket_league.png',
                'banner' => 'rocket_league.png',
                'grid' => 'rocket_league.png',
                'logo' => 'rocket_league.png',
                'genres' => ['Sports', 'Action']
            ],
            [
                'name' => 'Beat Saber',
                'description_en' => 'Beat Saber is a VR rhythm game where you slash to the beat of adrenaline-pumping music. Use lightsabers to cut through obstacles and test your reflexes in this immersive experience.',
                'description_pt' => 'Beat Saber é um jogo de ritmo em realidade virtual onde cortas ao ritmo de músicas cheias de adrenalina. Usa sabres de luz para cortar obstáculos e testa os teus reflexos nesta experiência imersiva.',
                'id_publisher' => Publisher::where('name', 'Beat Games')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2019-05-21',
                'icon' => 'beat_saber.png',
                'banner' => 'beat_saber.png',
                'grid' => 'beat_saber.png',
                'logo' => 'beat_saber.png',
                'genres' => ['Sports', 'Music', 'Indie']
            ],
            [
                'name' => 'Skate 3',
                'description_en' => 'Skate 3 takes skateboarding simulation to the next level with a massive open-world, advanced trick system, and multiplayer modes. Build your skate team and leave your mark on the city.',
                'description_pt' => 'Skate 3 eleva a simulação de skate a outro nível com um enorme mundo aberto, um sistema avançado de manobras e modos multijogador. Cria a tua equipa de skate e deixa a tua marca na cidade.',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2010-05-11',
                'icon' => 'skate_3.png',
                'banner' => 'skate_3.png',
                'grid' => 'skate_3.png',
                'logo' => 'skate_3.png',
                'genres' => ['Sports', 'Simulation']
            ],

            [
                'name' => 'Need for Speed: Most Wanted',
                'description_en' => 'Need for Speed: Most Wanted combines thrilling police chases with intense street racing. Outrun the law and rival racers in this action-packed installment of the NFS franchise.',
                'description_pt' => 'Need for Speed: Most Wanted combina emocionantes perseguições policiais com intensas corridas de rua. Foge à polícia e derrota os teus rivais nesta eletrizante edição da franquia NFS.',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2005-11-15',
                'icon' => 'nfs_most_wanted.png',
                'banner' => 'nfs_most_wanted.png',
                'grid' => 'nfs_most_wanted.png',
                'logo' => 'nfs_most_wanted.png',
                'genres' => ['Racing', 'Action']
            ],

            [
                'name' => 'Super Smash Bros. Ultimate',
                'description_en' => 'Super Smash Bros. Ultimate brings together every character from the franchise for the ultimate showdown. Battle it out with friends or online in this iconic crossover fighting game.',
                'description_pt' => 'Super Smash Bros. Ultimate reúne todos os personagens da franquia para o confronto definitivo. Luta com amigos ou online neste icónico jogo de luta crossover.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2018-12-07',
                'icon' => 'smash_bros_ultimate.png',
                'banner' => 'smash_bros_ultimate.png',
                'grid' => 'smash_bros_ultimate.png',
                'logo' => 'smash_bros_ultimate.png',
                'genres' => ['Fighting', 'Multiplayer', 'Party']
            ],
            [
                'name' => 'Guilty Gear Strive',
                'description_en' => 'Guilty Gear Strive is a fast-paced, stylish fighting game with beautifully animated visuals and a deep, engaging combat system. Perfect for both casual players and hardcore competitors.',
                'description_pt' => 'Guilty Gear Strive é um jogo de luta rápido e estiloso, com visuais lindamente animados e um sistema de combate profundo e envolvente. Perfeito tanto para jogadores casuais como para competidores hardcore.',
                'id_publisher' => Publisher::where('name', 'Arc System Works')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2021-06-11',
                'icon' => 'guilty_gear_strive.png',
                'banner' => 'guilty_gear_strive.png',
                'grid' => 'guilty_gear_strive.png',
                'logo' => 'guilty_gear_strive.png',
                'genres' => ['Fighting', 'Multiplayer', 'Arcade']
            ],
            [
                'name' => 'Mortal Kombat X',
                'description_en' => 'Mortal Kombat X offers visceral, brutal combat with iconic characters and new gameplay mechanics. Test your skills in cinematic story modes and online multiplayer battles.',
                'description_pt' => 'Mortal Kombat X oferece combates brutais e viscerais com personagens icónicos e novas mecânicas de jogabilidade. Testa as tuas habilidades nos modos de história cinematográficos e em batalhas multijogador online.',
                'id_publisher' => Publisher::where('name', 'NetherRealm Studios')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2015-04-14',
                'icon' => 'mortal_kombat_x.png',
                'banner' => 'mortal_kombat_x.png',
                'grid' => 'mortal_kombat_x.png',
                'logo' => 'mortal_kombat_x.png',
                'genres' => ['Fighting', 'Action']
            ],
            [
                'name' => 'Marvel vs. Capcom 2',
                'description_en' => 'Marvel vs. Capcom 2 is a classic fighting game that brings together heroes from the Marvel universe and Capcom franchises in epic 3-on-3 battles.',
                'description_pt' => 'Marvel vs. Capcom 2 é um jogo de luta clássico que reúne heróis do universo Marvel e das franquias da Capcom em épicas batalhas 3-contra-3.',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 14.99,
                'release_date' => '2000-03-30',
                'icon' => 'marvel_vs_capcom_2.png',
                'banner' => 'marvel_vs_capcom_2.png',
                'grid' => 'marvel_vs_capcom_2.png',
                'logo' => 'marvel_vs_capcom_2.png',
                'genres' => ['Fighting', 'Action']
            ],

            [
                'name' => 'PUBG: Battlegrounds',
                'description_en' => 'Play PUBG: BATTLEGROUNDS for free. Land on strategic locations, loot weapons and supplies, and survive to become the last team standing across various, diverse Battlegrounds.',
                'description_pt' => 'Jogue PUBG: BATTLEGROUNDS gratuitamente. Pouse em locais estratégicos, colete armas e suprimentos e sobreviva para ser a última equipe de pé em diversos campos de batalha.',
                'id_publisher' => Publisher::where('name', 'KRAFTON')->first()->id_publisher,
                'price' => 0.00,
                'release_date' => '2017-12-21',
                'icon' => 'pubg_battlegrounds.png',
                'banner' => 'pubg_battlegrounds.png',
                'grid' => 'pubg_battlegrounds.png',
                'logo' => 'pubg_battlegrounds.png',
                'genres' => ['Survival', 'Battle Royale']
            ],

            [
                'name' => 'Warframe',
                'description_en' => 'Awaken as an unstoppable warrior and battle alongside your friends in this story-driven free-to-play online action game.',
                'description_pt' => 'Desperte como um guerreiro imparável e lute ao lado de seus amigos neste jogo de ação online gratuito e guiado pela história.',
                'id_publisher' => Publisher::where('name', 'Digital Extremes')->first()->id_publisher,
                'price' => 0.00,
                'release_date' => '2013-03-25',
                'icon' => 'warframe.png',
                'banner' => 'warframe.png',
                'grid' => 'warframe.png',
                'logo' => 'warframe.png',
                'genres' => ['Action', 'MMO', 'Stealth']
            ],

            [
                'name' => 'Baldur\'s Gate 3',
                'description_en' => 'Baldur\'s Gate 3 is a story-rich, party-based RPG set in the universe of Dungeons & Dragons, where your choices shape a tale of fellowship and betrayal, survival and sacrifice, and the lure of absolute power.',
                'description_pt' => 'Baldur\'s Gate 3 é um RPG baseado em história e em grupos, ambientado no universo de Dungeons & Dragons, onde suas escolhas moldam uma história de companheirismo e traição, sobrevivência e sacrifício, e a atração pelo poder absoluto.',
                'id_publisher' => Publisher::where('name', 'Larian Studios')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2023-08-03',
                'icon' => 'baldurs_gate_3.png',
                'banner' => 'baldurs_gate_3.png',
                'grid' => 'baldurs_gate_3.png',
                'logo' => 'baldurs_gate_3.png',
                'genres' => ['RPG', 'Adventure', 'Indie']
            ],

            [
                'name' => 'Balatro',
                'description_en' => 'Balatro is a hypnotically satisfying deckbuilder where you play illegal poker hands, discover game-changing jokers, and trigger adrenaline-pumping, outrageous combos.',
                'description_pt' => 'Balatro é um construtor de baralhos hipnoticamente satisfatório onde você joga mãos de pôquer ilegais, descobre curingas que mudam o jogo e desencadeia combos emocionantes e absurdos.',
                'id_publisher' => Publisher::where('name', 'Playstack')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2024-02-20',
                'icon' => 'balatro.png',
                'banner' => 'balatro.png',
                'grid' => 'balatro.png',
                'logo' => 'balatro.png',
                'genres' => ['Card Games', 'Indie']
            ],

            [
                'name' => 'Black Desert',
                'description_en' => 'Played by over 20 million Adventurers, Black Desert Online is an open-world, action MMORPG. Experience intense, action-packed combat, battle massive world bosses, and train in professions such as fishing, trading, crafting, and cooking.',
                'description_pt' => 'Jogado por mais de 20 milhões de aventureiros, Black Desert Online é um MMORPG de ação em mundo aberto. Experimente combates intensos, enfrente chefes gigantes e treine em profissões como pesca, comércio, artesanato e culinária.',
                'id_publisher' => Publisher::where('name', 'Pearl Abyss')->first()->id_publisher,
                'price' => 9.99,
                'release_date' => '2017-05-24',
                'icon' => 'black_desert.png',
                'banner' => 'black_desert.png',
                'grid' => 'black_desert.png',
                'logo' => 'black_desert.png',
                'genres' => ['MMO', 'Action', 'RPG']
            ],

            [
                'name' => 'Factorio',
                'description_en' => 'Factorio is a game about building and creating automated factories to produce items of increasing complexity, within an infinite 2D world. Use your imagination to design your factory, combine simple elements into ingenious structures, and finally protect it from the creatures who don’t really like you.',
                'description_pt' => 'Factorio é um jogo sobre construir e criar fábricas automatizadas para produzir itens de complexidade crescente em um mundo 2D infinito. Use sua imaginação para projetar sua fábrica, combine elementos simples em estruturas engenhosas e proteja-a das criaturas que não gostam muito de você.',
                'id_publisher' => Publisher::where('name', 'Wube Software LTD.')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2020-08-14',
                'icon' => 'factorio.png',
                'banner' => 'factorio.png',
                'grid' => 'factorio.png',
                'logo' => 'factorio.png',
                'genres' => ['Simulation', 'Survival']

            ],

            [
                'name' => 'DayZ',
                'description_en' => 'How long can you survive a post-apocalyptic world? A land overrun with an infected "zombie" population, where you compete with other survivors for limited resources. Will you team up with strangers and stay strong together? Or play as a lone wolf to avoid betrayal? This is DayZ – this is your story.',
                'description_pt' => 'Por quanto tempo você pode sobreviver em um mundo pós-apocalíptico? Uma terra infestada por uma população infectada de "zumbis", onde você compete com outros sobreviventes por recursos limitados. Você vai se unir a estranhos e permanecer forte juntos? Ou vai jogar como um lobo solitário para evitar traições? Este é o DayZ – esta é a sua história.',
                'id_publisher' => Publisher::where('name', 'Bohemia Interactive')->first()->id_publisher,
                'price' => 44.99,
                'release_date' => '2018-12-13',
                'icon' => 'dayz.png',
                'banner' => 'dayz.png',
                'grid' => 'dayz.png',
                'logo' => 'dayz.png',
                'genres' => ['Survival', 'Horror']
            ],

            [
                'name' => 'Resident Evil Village',
                'description_en' => 'Experience survival horror like never before in Resident Evil Village. Uncover dark secrets and face terrifying creatures in a mysterious European village.',
                'description_pt' => 'Experimente o terror de sobrevivência como nunca antes em Resident Evil Village. Descubra segredos sombrios e enfrente criaturas aterrorizantes em uma misteriosa vila europeia.',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2021-05-07',
                'icon' => 'resident_evil_village.png',
                'banner' => 'resident_evil_village.png',
                'grid' => 'resident_evil_village.png',
                'logo' => 'resident_evil_village.png',
                'genres' => ['Horror', 'Survival', 'Action']
            ],

            [
                'name' => 'Dragon’s Dogma: Dark Arisen',
                'description_en' => 'Dragon’s Dogma: Dark Arisen offers a deep, open-world RPG experience with dynamic combat and a vast world to explore.',
                'description_pt' => 'Dragon’s Dogma: Dark Arisen oferece uma experiência de RPG em mundo aberto com combate dinâmico e um vasto mundo para explorar.',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2013-04-23',
                'icon' => 'dragons_dogma_dark_arisen.png',
                'banner' => 'dragons_dogma_dark_arisen.png',
                'grid' => 'dragons_dogma_dark_arisen.png',
                'logo' => 'dragons_dogma_dark_arisen.png',
                'genres' => ['RPG', 'Action', 'Adventure']
            ],

            [
                'name' => 'Monster Hunter Generations Ultimate',
                'description_en' => 'Monster Hunter Generations Ultimate brings an expanded version of the popular Monster Hunter Generations with more monsters, equipment, and quests. Hunt solo or with friends in this ultimate hunting experience.',
                'description_pt' => 'Monster Hunter Generations Ultimate traz uma versão expandida do popular Monster Hunter Generations com mais monstros, equipamentos e missões. Cace sozinho ou com amigos nesta experiência definitiva de caça.',
                'id_publisher' => Publisher::where('name', 'Capcom')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2018-08-28',
                'icon' => 'monster_hunter_generations_ultimate.png',
                'banner' => 'monster_hunter_generations_ultimate.jpg',
                'grid' => 'monster_hunter_generations_ultimate.png',
                'logo' => 'monster_hunter_generations_ultimate.png',
                'genres' => ['RPG', 'Action', 'Adventure']
            ],

            [
                'name' => 'Dark Souls',
                'description_en' => 'Dark Souls is a critically acclaimed action RPG known for its challenging difficulty, deep lore, and intricate world design. Face formidable enemies and overcome overwhelming odds in this unforgettable journey.',
                'description_pt' => 'Dark Souls é um RPG de ação aclamado pela crítica, conhecido por sua dificuldade desafiadora, rica história e design de mundo intrincado. Enfrente inimigos formidáveis e supere desafios incríveis nesta jornada inesquecível.',
                'id_publisher' => Publisher::where('name', 'FromSoftware')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2011-09-22',
                'icon' => 'dark_souls.png',
                'banner' => 'dark_souls.png',
                'grid' => 'dark_souls.png',
                'logo' => 'dark_souls.png',
                'genres' => ['RPG', 'Action', 'Adventure']
            ],

            [
                'name' => 'The Legend of Zelda: Twilight Princess',
                'description_en' => 'Embark on a dark and epic journey in The Legend of Zelda: Twilight Princess. Play as Link and transform into a wolf to save the kingdom of Hyrule from an encroaching darkness.',
                'description_pt' => 'Embarque em uma jornada sombria e épica em The Legend of Zelda: Twilight Princess. Jogue como Link e transforme-se em um lobo para salvar o reino de Hyrule de uma escuridão iminente.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2006-11-19',
                'icon' => 'zelda_twilight_princess.png',
                'banner' => 'zelda_twilight_princess.png',
                'grid' => 'zelda_twilight_princess.png',
                'logo' => 'zelda_twilight_princess.png',
                'genres' => ['Adventure', 'Action']
            ],

            [
                'name' => 'Super Mario Galaxy',
                'description_en' => 'Travel across dazzling galaxies in Super Mario Galaxy. Use gravity-defying mechanics to jump between planets and rescue Princess Peach from Bowser’s clutches.',
                'description_pt' => 'Viaje por galáxias deslumbrantes em Super Mario Galaxy. Use mecânicas que desafiam a gravidade para pular entre planetas e resgatar a Princesa Peach das garras de Bowser.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2007-11-12',
                'icon' => 'super_mario_galaxy.png',
                'banner' => 'super_mario_galaxy.png',
                'grid' => 'super_mario_galaxy.png',
                'logo' => 'super_mario_galaxy.png',
                'genres' => ['Platformer', 'Adventure']
            ],

            [
                'name' => 'Donkey Kong Country Returns',
                'description_en' => 'Join Donkey Kong and Diddy Kong on an adventure to reclaim their stolen banana hoard in Donkey Kong Country Returns. Overcome challenging platforming levels and defeat enemies across lush environments.',
                'description_pt' => 'Junte-se a Donkey Kong e Diddy Kong em uma aventura para recuperar seu estoque de bananas roubado em Donkey Kong Country Returns. Supere níveis desafiadores de plataforma e derrote inimigos em ambientes exuberantes.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2010-11-21',
                'icon' => 'donkey_kong_country_returns.png',
                'banner' => 'donkey_kong_country_returns.png',
                'grid' => 'donkey_kong_country_returns.png',
                'logo' => 'donkey_kong_country_returns.png',
                'genres' => ['Platformer', 'Adventure']
            ],

            [
                'name' => 'Assassin\'s Creed II',
                'description_en' => 'Step into the shoes of Ezio Auditore da Firenze in Assassin\'s Creed II. Explore the Italian Renaissance, unravel conspiracies, and master the art of stealth and assassination.',
                'description_pt' => 'Entre na pele de Ezio Auditore da Firenze em Assassin\'s Creed II. Explore a Renascença Italiana, desvende conspirações e domine a arte do stealth e das assassinas.',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2009-11-17',
                'icon' => 'assassins_creed_ii.png',
                'banner' => 'assassins_creed_ii.png',
                'grid' => 'assassins_creed_ii.png',
                'logo' => 'assassins_creed_ii.png',
                'genres' => ['Adventure', 'Stealth', 'Action']
            ],

            [
                'name' => 'Rayman Legends',
                'description_en' => 'Rayman Legends delivers fast-paced platforming action with stunning visuals and creative level design. Play solo or with friends in this critically acclaimed adventure.',
                'description_pt' => 'Rayman Legends oferece ação de plataforma acelerada com visuais impressionantes e design de nível criativo. Jogue sozinho ou com amigos nesta aventura aclamada pela crítica.',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2013-09-03',
                'icon' => 'rayman_legends.png',
                'banner' => 'rayman_legends.png',
                'grid' => 'rayman_legends.png',
                'logo' => 'rayman_legends.png',
                'genres' => ['Platformer', 'Adventure, Music']
            ],

            [
                'name' => 'Far Cry 3',
                'description_en' => 'Survive a tropical nightmare in Far Cry 3. Explore a dangerous open world, face psychotic enemies, and uncover a gripping story of survival and madness.',
                'description_pt' => 'Sobreviva a um pesadelo tropical em Far Cry 3. Explore um mundo aberto perigoso, enfrente inimigos psicóticos e descubra uma história envolvente de sobrevivência e loucura.',
                'id_publisher' => Publisher::where('name', 'Ubisoft')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2012-11-29',
                'icon' => 'far_cry_3.png',
                'banner' => 'far_cry_3.png',
                'grid' => 'far_cry_3.png',
                'logo' => 'far_cry_3.png',
                'genres' => ['Action', 'Adventure', 'FPS']
            ],

            [
                'name' => 'Titanfall 2',
                'description_en' => 'Pilot massive Titans and engage in high-speed combat in Titanfall 2. Experience an emotional single-player campaign and intense multiplayer battles.',
                'description_pt' => 'Pilote Titãs gigantes e participe de combates de alta velocidade em Titanfall 2. Viva uma campanha emocionante para um jogador e batalhas multijogador intensas.',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2016-10-28',
                'icon' => 'titanfall_2.png',
                'banner' => 'titanfall_2.png',
                'grid' => 'titanfall_2.png',
                'logo' => 'titanfall_2.png',
                'genres' => ['FPS', 'Action', 'Adventure']
            ],

            [
                'name' => 'Dead Space',
                'description_en' => 'Step aboard the abandoned USG Ishimura in Dead Space, where horrifying creatures known as Necromorphs lurk. Survive the terrifying atmosphere and uncover dark secrets in this survival horror classic.',
                'description_pt' => 'Entre a bordo da abandonada USG Ishimura em Dead Space, onde criaturas horripilantes conhecidas como Necromorphs espreitam. Sobreviva a uma atmosfera aterrorizante e descubra segredos sombrios neste clássico de horror de sobrevivência.',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2008-10-14',
                'icon' => 'dead_space.png',
                'banner' => 'dead_space.png',
                'grid' => 'dead_space.png',
                'logo' => 'dead_space.png',
                'genres' => ['Horror', 'Survival', 'Action']
            ],

            [
                'name' => 'Dragon Age: Inquisition',
                'description_en' => 'Lead the Inquisition in Dragon Age: Inquisition and decide the fate of Thedas. Recruit allies, make impactful choices, and engage in strategic combat in this epic RPG adventure.',
                'description_pt' => 'Lidere a Inquisição em Dragon Age: Inquisition e decida o destino de Thedas. Recrute aliados, tome decisões impactantes e participe de combates estratégicos nesta épica aventura de RPG.',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2014-11-18',
                'icon' => 'dragon_age_inquisition.png',
                'banner' => 'dragon_age_inquisition.png',
                'grid' => 'dragon_age_inquisition.png',
                'logo' => 'dragon_age_inquisition.png',
                'genres' => ['RPG', 'Adventure', 'Strategy']
            ],

            [
                'name' => 'Mass Effect 2',
                'description_en' => 'As Commander Shepard, recruit a diverse team to face a deadly threat in Mass Effect 2. Experience an intense sci-fi RPG with deep character interactions and galaxy-spanning choices.',
                'description_pt' => 'Como o Comandante Shepard, recrute uma equipe diversificada para enfrentar uma ameaça mortal em Mass Effect 2. Viva um intenso RPG de ficção científica com interações profundas entre personagens e escolhas que afetam a galáxia.',
                'id_publisher' => Publisher::where('name', 'EA')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2010-01-26',
                'icon' => 'mass_effect_2.png',
                'banner' => 'mass_effect_2.png',
                'grid' => 'mass_effect_2.png',
                'logo' => 'mass_effect_2.png',
                'genres' => ['RPG', 'Action', 'Adventure']
            ],

            [
                'name' => 'NieR: Automata',
                'description_en' => 'NieR: Automata tells the story of androids 2B, 9S, and A2 as they fight to reclaim Earth from powerful machines. Experience fast-paced combat and a deeply emotional narrative.',
                'description_pt' => 'NieR: Automata conta a história dos androides 2B, 9S e A2 enquanto lutam para recuperar a Terra de máquinas poderosas. Experimente combates frenéticos e uma narrativa profundamente emocional.',
                'id_publisher' => Publisher::where('name', 'Square Enix')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2017-03-07',
                'icon' => 'nier_automata.png',
                'banner' => 'nier_automata.png',
                'grid' => 'nier_automata.png',
                'logo' => 'nier_automata.png',
                'genres' => ['Action', 'RPG', 'Adventure']
            ],

            [
                'name' => 'NieR Replicant ver.1.22474487139...',
                'description_en' => 'NieR Replicant is a reimagined prequel to NieR: Automata. Follow a young protagonist’s quest to cure his sister’s deadly illness in a hauntingly beautiful world.',
                'description_pt' => 'NieR Replicant é um prelúdio reimaginado de NieR: Automata. Siga a jornada de um jovem em busca de curar a doença mortal de sua irmã em um mundo assombrosamente belo.',
                'id_publisher' => Publisher::where('name', 'Square Enix')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2021-04-23',
                'icon' => 'nier_replicant.png',
                'banner' => 'nier_replicant.png',
                'grid' => 'nier_replicant.png',
                'logo' => 'nier_replicant.png',
                'genres' => ['Action', 'RPG', 'Adventure']
            ],

            [
                'name' => 'Kingdom Hearts',
                'description_en' => 'Join Sora, Donald, and Goofy as they travel across Disney worlds to stop the Heartless in Kingdom Hearts. Experience a magical blend of action and storytelling.',
                'description_pt' => 'Junte-se a Sora, Donald e Pateta enquanto viajam por mundos da Disney para deter os Heartless em Kingdom Hearts. Viva uma mistura mágica de ação e narrativa.',
                'id_publisher' => Publisher::where('name', 'Square Enix')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2002-03-28',
                'icon' => 'kingdom_hearts.png',
                'banner' => 'kingdom_hearts.png',
                'grid' => 'kingdom_hearts.png',
                'logo' => 'kingdom_hearts.png',
                'genres' => ['RPG', 'Adventure', 'Action']
            ],

            [
                'name' => 'Final Fantasy VI',
                'description_en' => 'Final Fantasy VI is a classic RPG known for its vast cast of characters and groundbreaking story. Fight against the tyrannical Kefka and bring peace to a war-torn world.',
                'description_pt' => 'Final Fantasy VI é um RPG clássico conhecido por seu vasto elenco de personagens e uma história inovadora. Lute contra o tirânico Kefka e traga paz a um mundo devastado pela guerra.',
                'id_publisher' => Publisher::where('name', 'Square Enix')->first()->id_publisher,
                'price' => 14.99,
                'release_date' => '1994-04-02',
                'icon' => 'final_fantasy_vi.png',
                'banner' => 'final_fantasy_vi.jpg',
                'grid' => 'final_fantasy_vi.png',
                'logo' => 'final_fantasy_vi.png',
                'genres' => ['RPG', 'Adventure']
            ],

            [
                'name' => 'Final Fantasy VII',
                'description_en' => 'Join Cloud Strife and his allies as they fight against the evil Shinra corporation and the enigmatic Sephiroth in this legendary RPG.',
                'description_pt' => 'Junte-se a Cloud Strife e seus aliados enquanto lutam contra a corporação maligna Shinra e o enigmático Sephiroth neste lendário RPG.',
                'id_publisher' => Publisher::where('name', 'Square Enix')->first()->id_publisher,
                'price' => 15.99,
                'release_date' => '1997-01-31',
                'icon' => 'final_fantasy_vii.png',
                'banner' => 'final_fantasy_vii.png',
                'grid' => 'final_fantasy_vii.png',
                'logo' => 'final_fantasy_vii.png',
                'genres' => ['RPG', 'Adventure']
            ],

            [
                'name' => 'Final Fantasy IX',
                'description_en' => 'Embark on an epic journey with Zidane, Garnet, and their friends in Final Fantasy IX. Discover ancient secrets and save the world from an apocalyptic threat.',
                'description_pt' => 'Embarque em uma jornada épica com Zidane, Garnet e seus amigos em Final Fantasy IX. Descubra segredos antigos e salve o mundo de uma ameaça apocalíptica.',
                'id_publisher' => Publisher::where('name', 'Square Enix')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2000-07-07',
                'icon' => 'final_fantasy_ix.png',
                'banner' => 'final_fantasy_ix.jpg',
                'grid' => 'final_fantasy_ix.png',
                'logo' => 'final_fantasy_ix.png',
                'genres' => ['RPG', 'Adventure']
            ],

            [
                'name' => 'Final Fantasy XIII',
                'description_en' => 'Follow Lightning and her companions as they defy fate in Final Fantasy XIII. Experience fast-paced combat and stunning visuals in this modern RPG.',
                'description_pt' => 'Siga Lightning e seus companheiros enquanto desafiam o destino em Final Fantasy XIII. Experimente combates acelerados e visuais impressionantes neste RPG moderno.',
                'id_publisher' => Publisher::where('name', 'Square Enix')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2009-12-17',
                'icon' => 'final_fantasy_xiii.png',
                'banner' => 'final_fantasy_xiii.png',
                'grid' => 'final_fantasy_xiii.png',
                'logo' => 'final_fantasy_xiii.png',
                'genres' => ['RPG', 'Adventure']
            ],

            [
                'name' => 'The Elder Scrolls V: Skyrim',
                'description_en' => 'Explore the vast world of Skyrim, a land of dragons, magic, and endless adventure. Become the Dragonborn and shape your destiny in this legendary open-world RPG.',
                'description_pt' => 'Explore o vasto mundo de Skyrim, uma terra de dragões, magia e aventuras infinitas. Torne-se o Dragonborn e molde seu destino neste lendário RPG de mundo aberto.',
                'id_publisher' => Publisher::where('name', 'Bethesda')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2011-11-11',
                'icon' => 'skyrim.png',
                'banner' => 'skyrim.png',
                'grid' => 'skyrim.png',
                'logo' => 'skyrim.png',
                'genres' => ['RPG', 'Adventure', 'Open World']
            ],

            [
                'name' => 'Fallout 3',
                'description_en' => 'Enter a post-apocalyptic world in Fallout 3. Explore the Wasteland, make choices that shape your future, and battle enemies in this critically acclaimed RPG.',
                'description_pt' => 'Entre em um mundo pós-apocalíptico em Fallout 3. Explore a Terra Devastada, tome decisões que moldam seu futuro e enfrente inimigos neste RPG aclamado pela crítica.',
                'id_publisher' => Publisher::where('name', 'Bethesda')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2008-10-28',
                'icon' => 'fallout_3.png',
                'banner' => 'fallout_3.png',
                'grid' => 'fallout_3.png',
                'logo' => 'fallout_3.png',
                'genres' => ['RPG', 'Adventure', 'Action']
            ],

            [
                'name' => 'Fallout: New Vegas',
                'description_en' => 'Venture into the Mojave Desert in Fallout: New Vegas. Experience a gripping story full of political intrigue, moral choices, and intense combat.',
                'description_pt' => 'Aventure-se no Deserto de Mojave em Fallout: New Vegas. Experimente uma história envolvente cheia de intriga política, escolhas morais e combates intensos.',
                'id_publisher' => Publisher::where('name', 'Bethesda')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2010-10-19',
                'icon' => 'fallout_new_vegas.png',
                'banner' => 'fallout_new_vegas.png',
                'grid' => 'fallout_new_vegas.png',
                'logo' => 'fallout_new_vegas.png',
                'genres' => ['RPG', 'Adventure', 'Action']
            ],

            [
                'name' => 'DOOM (2016)',
                'description_en' => 'Rip and tear through hordes of demons in DOOM. Experience fast-paced, brutal combat with devastating weapons and relentless action.',
                'description_pt' => 'Destrua hordas de demônios em DOOM. Experimente combates brutais e acelerados com armas devastadoras e ação implacável.',
                'id_publisher' => Publisher::where('name', 'Bethesda')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2016-05-13',
                'icon' => 'doom_2016.png',
                'banner' => 'doom_2016.png',
                'grid' => 'doom_2016.png',
                'logo' => 'doom_2016.png',
                'genres' => ['FPS', 'Action']
            ],

            [
                'name' => 'Diablo II: Resurrected',
                'description_en' => 'Relive the classic action RPG in Diablo II: Resurrected. Battle the forces of evil across Sanctuary and collect powerful loot in this remastered adventure.',
                'description_pt' => 'Reviva o clássico RPG de ação em Diablo II: Resurrected. Lute contra as forças do mal em Santuário e colete itens poderosos nesta aventura remasterizada.',
                'id_publisher' => Publisher::where('name', 'Blizzard')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2021-09-23',
                'icon' => 'diablo_ii_resurrected.png',
                'banner' => 'diablo_ii_resurrected.png',
                'grid' => 'diablo_ii_resurrected.png',
                'logo' => 'diablo_ii_resurrected.png',
                'genres' => ['Action', 'RPG']
            ],

            [
                'name' => 'StarCraft II: Wings of Liberty',
                'description_en' => 'Lead powerful armies of Terran, Zerg, or Protoss in StarCraft II. Experience epic real-time strategy battles and a gripping sci-fi narrative.',
                'description_pt' => 'Lidere exércitos poderosos de Terranos, Zergs ou Protoss em StarCraft II. Experimente batalhas épicas de estratégia em tempo real e uma narrativa envolvente de ficção científica.',
                'id_publisher' => Publisher::where('name', 'Blizzard')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2010-07-27',
                'icon' => 'starcraft_ii.png',
                'banner' => 'starcraft_ii.jpg',
                'grid' => 'starcraft_ii.png',
                'logo' => 'starcraft_ii.png',
                'genres' => ['Strategy', 'RTS']
            ],

            [
                'name' => 'World of Warcraft',
                'description_en' => 'Embark on an epic journey in World of Warcraft. Join millions of players in this legendary MMORPG, exploring vast continents and battling dangerous foes.',
                'description_pt' => 'Embarque em uma jornada épica em World of Warcraft. Junte-se a milhões de jogadores neste lendário MMORPG, explorando vastos continentes e enfrentando inimigos perigosos.',
                'id_publisher' => Publisher::where('name', 'Blizzard')->first()->id_publisher,
                'price' => 14.99,  // Subscription-based
                'release_date' => '2004-11-23',
                'icon' => 'world_of_warcraft.png',
                'banner' => 'world_of_warcraft.png',
                'grid' => 'world_of_warcraft.png',
                'logo' => 'world_of_warcraft.png',
                'genres' => ['MMO', 'RPG', 'Adventure']
            ],

            [
                'name' => 'Overwatch',
                'description_en' => 'Join the fight for the future in Overwatch. Choose from a diverse roster of heroes and engage in fast-paced team-based combat.',
                'description_pt' => 'Junte-se à luta pelo futuro em Overwatch. Escolha entre uma variedade de heróis e participe de combates rápidos em equipe.',
                'id_publisher' => Publisher::where('name', 'Blizzard')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2016-05-24',
                'icon' => 'overwatch.png',
                'banner' => 'overwatch.png',
                'grid' => 'overwatch.png',
                'logo' => 'overwatch.png',
                'genres' => ['FPS', 'Multiplayer']
            ],

            [
                'name' => 'Warcraft III: Reforged',
                'description_en' => 'Warcraft III: Reforged is a remaster of the legendary RTS. Command the armies of Azeroth and experience the epic conflict between Humans, Orcs, Night Elves, and the Undead.',
                'description_pt' => 'Warcraft III: Reforged é uma remasterização do lendário jogo de estratégia em tempo real. Comande os exércitos de Azeroth e vivencie o conflito épico entre Humanos, Orcs, Elfos Noturnos e os Mortos-Vivos.',
                'id_publisher' => Publisher::where('name', 'Blizzard')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2020-01-28',
                'icon' => 'warcraft_iii_reforged.png',
                'banner' => 'warcraft_iii_reforged.png',
                'grid' => 'warcraft_iii_reforged.png',
                'logo' => 'warcraft_iii_reforged.png',
                'genres' => ['Strategy', 'RTS']
            ],

            [
                'name' => 'Castlevania: Symphony of the Night',
                'description_en' => 'Explore the vast, mysterious castle of Dracula in Castlevania: Symphony of the Night. Uncover secrets, defeat powerful enemies, and gain new abilities in this genre-defining action-adventure.',
                'description_pt' => 'Explore o vasto e misterioso castelo de Drácula em Castlevania: Symphony of the Night. Descubra segredos, derrote inimigos poderosos e adquira novas habilidades neste jogo de ação e aventura que definiu um gênero.',
                'id_publisher' => Publisher::where('name', 'Konami')->first()->id_publisher,
                'price' => 14.99,
                'release_date' => '1997-10-02',
                'icon' => 'castlevania_symphony_of_the_night.png',
                'banner' => 'castlevania_symphony_of_the_night.png',
                'grid' => 'castlevania_symphony_of_the_night.png',
                'logo' => 'castlevania_symphony_of_the_night.png',
                'genres' => ['Action', 'Adventure', 'Platformer']
            ],

            [
                'name' => 'Silent Hill 2',
                'description_en' => 'Silent Hill 2 is a psychological horror masterpiece. Follow James Sunderland as he uncovers terrifying truths in the fog-covered town of Silent Hill.',
                'description_pt' => 'Silent Hill 2 é uma obra-prima do horror psicológico. Acompanhe James Sunderland enquanto ele descobre verdades aterrorizantes na cidade coberta de névoa de Silent Hill.',
                'id_publisher' => Publisher::where('name', 'Konami')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2001-09-24',
                'icon' => 'silent_hill_2.png',
                'banner' => 'silent_hill_2.png',
                'grid' => 'silent_hill_2.png',
                'logo' => 'silent_hill_2.png',
                'genres' => ['Horror', 'Survival', 'Adventure']
            ],

            [
                'name' => 'Metal Gear Solid 3: Snake Eater',
                'description_en' => 'Experience tactical espionage action in Metal Gear Solid 3: Snake Eater. Control Naked Snake as he infiltrates the jungle to stop a nuclear threat during the Cold War.',
                'description_pt' => 'Experimente a ação de espionagem tática em Metal Gear Solid 3: Snake Eater. Controle Naked Snake enquanto ele se infiltra na selva para impedir uma ameaça nuclear durante a Guerra Fria.',
                'id_publisher' => Publisher::where('name', 'Konami')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2004-11-17',
                'icon' => 'metal_gear_solid_3_snake_eater.png',
                'banner' => 'metal_gear_solid_3_snake_eater.png',
                'grid' => 'metal_gear_solid_3_snake_eater.png',
                'logo' => 'metal_gear_solid_3_snake_eater.png',
                'genres' => ['Stealth', 'Action', 'Adventure']
            ],

            [
                'name' => 'The Witcher 3: Wild Hunt',
                'description_en' => 'Step into the shoes of Geralt of Rivia, a monster hunter navigating a war-torn world. Experience a richly detailed RPG with deep storytelling, unforgettable quests, and dangerous creatures to hunt.',
                'description_pt' => 'Entre na pele de Geralt de Rivia, um caçador de monstros em um mundo devastado pela guerra. Experimente um RPG ricamente detalhado com narrativa profunda, missões inesquecíveis e criaturas perigosas para caçar.',
                'id_publisher' => Publisher::where('name', 'CD Projekt Red')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2015-05-19',
                'icon' => 'witcher_3_wild_hunt.png',
                'banner' => 'witcher_3_wild_hunt.png',
                'grid' => 'witcher_3_wild_hunt.png',
                'logo' => 'witcher_3_wild_hunt.png',
                'genres' => ['RPG', 'Adventure', 'Open World']
            ],

            [
                'name' => 'Cyberpunk 2077',
                'description_en' => 'Enter the neon-lit streets of Night City in Cyberpunk 2077. Play as V, a mercenary in a dystopian future, and shape your story through choices, cybernetic enhancements, and intense combat.',
                'description_pt' => 'Entre nas ruas iluminadas por neon de Night City em Cyberpunk 2077. Jogue como V, um mercenário em um futuro distópico, e molde sua história por meio de escolhas, aprimoramentos cibernéticos e combates intensos.',
                'id_publisher' => Publisher::where('name', 'CD Projekt Red')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2020-12-10',
                'icon' => 'cyberpunk_2077.png',
                'banner' => 'cyberpunk_2077.png',
                'grid' => 'cyberpunk_2077.png',
                'logo' => 'cyberpunk_2077.png',
                'genres' => ['RPG', 'Action', 'Open World']
            ],

            [
                'name' => 'God of War',
                'description_en' => 'Embark on a brutal quest for revenge as Kratos, a Spartan warrior, in God of War. Face mythological creatures and gods in this critically acclaimed action-adventure game.',
                'description_pt' => 'Embarque em uma jornada brutal de vingança como Kratos, um guerreiro espartano, em God of War. Enfrente criaturas mitológicas e deuses neste aclamado jogo de ação e aventura.',
                'id_publisher' => Publisher::where('name', 'Sony Interactive')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2005-03-22',
                'icon' => 'god_of_war_1.png',
                'banner' => 'god_of_war_1.png',
                'grid' => 'god_of_war_1.png',
                'logo' => 'god_of_war_1.png',
                'genres' => ['Action', 'Adventure', 'Hack and Slash']
            ],

            [
                'name' => 'God of War II',
                'description_en' => 'Continue the saga of Kratos in God of War II. Fight your way through gods and titans in a quest for vengeance and ultimate power.',
                'description_pt' => 'Continue a saga de Kratos em God of War II. Lute contra deuses e titãs em uma busca por vingança e poder supremo.',
                'id_publisher' => Publisher::where('name', 'Sony Interactive')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2007-03-13',
                'icon' => 'god_of_war_2.png',
                'banner' => 'god_of_war_2.png',
                'grid' => 'god_of_war_2.png',
                'logo' => 'god_of_war_2.png',
                'genres' => ['Action', 'Adventure', 'Hack and Slash']
            ],

            [
                'name' => 'God of War III',
                'description_en' => 'Witness the epic conclusion to Kratos’ journey in God of War III. Scale Mount Olympus, defeat the gods, and unleash your fury in this legendary action-adventure.',
                'description_pt' => 'Assista à conclusão épica da jornada de Kratos em God of War III. Escale o Monte Olimpo, derrote os deuses e libere sua fúria neste lendário jogo de ação e aventura.',
                'id_publisher' => Publisher::where('name', 'Sony Interactive')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2010-03-16',
                'icon' => 'god_of_war_3.png',
                'banner' => 'god_of_war_3.png',
                'grid' => 'god_of_war_3.png',
                'logo' => 'god_of_war_3.png',
                'genres' => ['Action', 'Adventure', 'Hack and Slash']
            ],

            [
                'name' => 'Horizon Zero Dawn',
                'description_en' => 'Explore a post-apocalyptic world overrun by robotic creatures in Horizon Zero Dawn. Play as Aloy and uncover the mysteries of her world while battling mechanical beasts.',
                'description_pt' => 'Explore um mundo pós-apocalíptico dominado por criaturas robóticas em Horizon Zero Dawn. Jogue como Aloy e desvende os mistérios de seu mundo enquanto enfrenta feras mecânicas.',
                'id_publisher' => Publisher::where('name', 'Sony Interactive')->first()->id_publisher,
                'price' => 49.99,
                'release_date' => '2017-02-28',
                'icon' => 'horizon_zero_dawn.png',
                'banner' => 'horizon_zero_dawn.png',
                'grid' => 'horizon_zero_dawn.png',
                'logo' => 'horizon_zero_dawn.png',
                'genres' => ['RPG', 'Adventure', 'Open World']
            ],

            [
                'name' => 'Shadow of the Colossus',
                'description_en' => 'Embark on a quest to defeat towering colossi in Shadow of the Colossus. Experience a hauntingly beautiful world with epic battles and a mysterious story.',
                'description_pt' => 'Embarque em uma missão para derrotar colossos gigantes em Shadow of the Colossus. Experimente um mundo assombrosamente belo com batalhas épicas e uma história misteriosa.',
                'id_publisher' => Publisher::where('name', 'Sony Interactive')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2005-10-18',
                'icon' => 'shadow_of_the_colossus.png',
                'banner' => 'shadow_of_the_colossus.png',
                'grid' => 'shadow_of_the_colossus.png',
                'logo' => 'shadow_of_the_colossus.png',
                'genres' => ['Adventure', 'Action']
            ],

            [
                'name' => 'inFAMOUS: Second Son',
                'description_en' => 'Take control of superpowered protagonist Delsin Rowe in inFAMOUS: Second Son. Choose your path and wield powerful abilities in a city under oppressive control.',
                'description_pt' => 'Assuma o controle de Delsin Rowe, um protagonista com superpoderes, em inFAMOUS: Second Son. Escolha seu caminho e utilize habilidades poderosas em uma cidade sob controle opressor.',
                'id_publisher' => Publisher::where('name', 'Sony Interactive')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2014-03-21',
                'icon' => 'infamous_second_son.png',
                'banner' => 'infamous_second_son.png',
                'grid' => 'infamous_second_son.png',
                'logo' => 'infamous_second_son.png',
                'genres' => ['Action', 'Adventure']
            ],

            [
                'name' => 'Team Fortress 2',
                'description_en' => 'Team Fortress 2 is a team-based multiplayer shooter with unique classes, fast-paced gameplay, and a wide variety of game modes and hats!',
                'description_pt' => 'Team Fortress 2 é um jogo de tiro multijogador baseado em equipes com classes únicas, jogabilidade acelerada e uma grande variedade de modos de jogo e chapéus!',
                'id_publisher' => Publisher::where('name', 'Valve')->first()->id_publisher,
                'price' => 0.00,
                'release_date' => '2007-10-10',
                'icon' => 'team_fortress_2.png',
                'banner' => 'team_fortress_2.png',
                'grid' => 'team_fortress_2.png',
                'logo' => 'team_fortress_2.png',
                'genres' => ['FPS', 'Multiplayer']
            ],

            [
                'name' => 'Dota 2',
                'description_en' => 'Dota 2 is a competitive MOBA where two teams of five players battle to destroy the enemy’s Ancient. Master a vast roster of heroes and strategic play in this legendary eSports title.',
                'description_pt' => 'Dota 2 é um MOBA competitivo onde duas equipes de cinco jogadores batalham para destruir o Ancião inimigo. Domine uma vasta lista de heróis e estratégias neste lendário título de eSports.',
                'id_publisher' => Publisher::where('name', 'Valve')->first()->id_publisher,
                'price' => 0.00,
                'release_date' => '2013-07-09',
                'icon' => 'dota_2.png',
                'banner' => 'dota_2.png',
                'grid' => 'dota_2.png',
                'logo' => 'dota_2.png',
                'genres' => ['Strategy', 'MOBA']
            ],

            [
                'name' => 'Counter-Strike: Global Offensive',
                'description_en' => 'Counter-Strike: Global Offensive (CS:GO) is a tactical FPS where teams of Terrorists and Counter-Terrorists face off in objective-based battles.',
                'description_pt' => 'Counter-Strike: Global Offensive (CS:GO) é um FPS tático onde equipes de Terroristas e Contra-Terroristas se enfrentam em batalhas baseadas em objetivos.',
                'id_publisher' => Publisher::where('name', 'Valve')->first()->id_publisher,
                'price' => 0.00,
                'release_date' => '2012-08-21',
                'icon' => 'cs_go.png',
                'banner' => 'cs_go.png',
                'grid' => 'cs_go.png',
                'logo' => 'cs_go.png',
                'genres' => ['FPS', 'Multiplayer']
            ],

            [
                'name' => 'Ori and the Blind Forest',
                'description_en' => 'Experience a touching story and breathtaking visuals in Ori and the Blind Forest. Guide Ori through a beautifully crafted world filled with platforming challenges and emotional moments.',
                'description_pt' => 'Experimente uma história comovente e visuais deslumbrantes em Ori and the Blind Forest. Guie Ori por um mundo belamente criado, repleto de desafios de plataforma e momentos emocionantes.',
                'id_publisher' => Publisher::where('name', 'Microsoft')->first()->id_publisher,
                'price' => 19.99,
                'release_date' => '2015-03-11',
                'icon' => 'ori_and_the_blind_forest.png',
                'banner' => 'ori_and_the_blind_forest.png',
                'grid' => 'ori_and_the_blind_forest.png',
                'logo' => 'ori_and_the_blind_forest.png',
                'genres' => ['Platformer', 'Adventure']
            ],

            [
                'name' => 'Halo: Reach',
                'description_en' => 'Relive the legendary battle for Reach in Halo: Reach. Experience intense FPS combat, a gripping story, and iconic multiplayer modes in this critically acclaimed installment of the Halo series.',
                'description_pt' => 'Reviva a lendária batalha por Reach em Halo: Reach. Experimente combates FPS intensos, uma história envolvente e modos multijogador icônicos nesta aclamada edição da série Halo.',
                'id_publisher' => Publisher::where('name', 'Microsoft')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2010-09-14',
                'icon' => 'halo_reach.png',
                'banner' => 'halo_reach.png',
                'grid' => 'halo_reach.png',
                'logo' => 'halo_reach.png',
                'genres' => ['FPS', 'Action', 'Sci-Fi']
            ],

            [
                'name' => 'Minecraft',
                'description_en' => 'Unleash your creativity in Minecraft, a sandbox game where you can build, explore, and survive in a blocky, procedurally generated world.',
                'description_pt' => 'Libere sua criatividade em Minecraft, um jogo sandbox onde você pode construir, explorar e sobreviver em um mundo gerado proceduralmente com blocos.',
                'id_publisher' => Publisher::where('name', 'Microsoft')->first()->id_publisher,
                'price' => 26.95,
                'release_date' => '2011-11-18',
                'icon' => 'minecraft.png',
                'banner' => 'minecraft.png',
                'grid' => 'minecraft.png',
                'logo' => 'minecraft.png',
                'genres' => ['Adventure', 'Simulation', 'Sandbox']
            ],

            [
                'name' => 'Persona 3 Reload',
                'description_en' => 'Join the Specialized Extracurricular Execution Squad (SEES) in Persona 3. Face the mysterious Dark Hour, summon powerful Personas, and balance high school life with battling dangerous shadows.',
                'description_pt' => 'Junte-se ao Esquadrão Especializado de Execução Extracurricular (SEES) em Persona 3. Enfrente a misteriosa Dark Hour, invoque Personas poderosas e equilibre a vida escolar com combates contra sombras perigosas.',
                'id_publisher' => Publisher::where('name', 'Atlus')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2006-07-13',
                'icon' => 'persona_3.png',
                'banner' => 'persona_3.png',
                'grid' => 'persona_3.png',
                'logo' => 'persona_3.png',
                'genres' => ['RPG', 'Adventure', 'Turn-Based']
            ],

            [
                'name' => 'Dragon Ball FighterZ',
                'description_en' => 'Dragon Ball FighterZ delivers intense 3v3 fighting action with stunning anime visuals. Choose from a wide roster of iconic Dragon Ball characters and unleash powerful combos and special moves.',
                'description_pt' => 'Dragon Ball FighterZ oferece ação intensa de luta 3v3 com visuais impressionantes em estilo anime. Escolha entre uma ampla lista de personagens icônicos de Dragon Ball e desencadeie combos poderosos e golpes especiais.',
                'id_publisher' => Publisher::where('name', 'Arc System Works')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2018-01-26',
                'icon' => 'dragon_ball_fighterz.png',
                'banner' => 'dragon_ball_fighterz.png',
                'grid' => 'dragon_ball_fighterz.png',
                'logo' => 'dragon_ball_fighterz.png',
                'genres' => ['Fighting', 'Action']
            ],

            [
                'name' => 'Mortal Kombat',
                'description_en' => 'Mortal Kombat (MK9) is a brutal and fast-paced fighting game that reboots the iconic series. Experience an epic story mode, visceral fatalities, and intense 1v1 combat.',
                'description_pt' => 'Mortal Kombat (MK9) é um jogo de luta brutal e acelerado que reinicia a icônica série. Experimente um modo história épico, fatalities viscerais e combates intensos 1v1.',
                'id_publisher' => Publisher::where('name', 'NetherRealm Studios')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2011-04-19',
                'icon' => 'mortal_kombat_9.png',
                'banner' => 'mortal_kombat_9.png',
                'grid' => 'mortal_kombat_9.png',
                'logo' => 'mortal_kombat_9.png',
                'genres' => ['Fighting', 'Action']
            ],

            [
                'name' => 'Grand Theft Auto V',
                'description_en' => 'Explore the vast, dynamic world of Los Santos in GTA V. Switch between three protagonists, complete daring heists, and engage in endless open-world activities.',
                'description_pt' => 'Explore o vasto e dinâmico mundo de Los Santos em GTA V. Alterne entre três protagonistas, realize assaltos ousados e participe de atividades infinitas em mundo aberto.',
                'id_publisher' => Publisher::where('name', 'Rockstar Games')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2013-09-17',
                'icon' => 'gta_v.png',
                'banner' => 'gta_v.png',
                'grid' => 'gta_v.png',
                'logo' => 'gta_v.png',
                'genres' => ['Action', 'Adventure', 'Open World']
            ],

            [
                'name' => 'Red Dead Redemption 2',
                'description_en' => 'Immerse yourself in the Wild West with Red Dead Redemption 2. Follow Arthur Morgan’s journey through a world of outlaws, lawmen, and survival.',
                'description_pt' => 'Mergulhe no Velho Oeste com Red Dead Redemption 2. Acompanhe a jornada de Arthur Morgan em um mundo de foras da lei, autoridades e sobrevivência.',
                'id_publisher' => Publisher::where('name', 'Rockstar Games')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2018-10-26',
                'icon' => 'red_dead_redemption_2.png',
                'banner' => 'red_dead_redemption_2.png',
                'grid' => 'red_dead_redemption_2.png',
                'logo' => 'red_dead_redemption_2.png',
                'genres' => ['Action', 'Adventure', 'Open World']
            ],

            [
                'name' => 'Grand Theft Auto: San Andreas',
                'description_en' => 'Join CJ in a quest to save his family and reclaim control of the streets in GTA: San Andreas. Explore a massive open world filled with gang wars, crime, and secrets.',
                'description_pt' => 'Junte-se a CJ em uma missão para salvar sua família e retomar o controle das ruas em GTA: San Andreas. Explore um enorme mundo aberto cheio de guerras de gangues, crimes e segredos.',
                'id_publisher' => Publisher::where('name', 'Rockstar Games')->first()->id_publisher,
                'price' => 14.99,
                'release_date' => '2004-10-26',
                'icon' => 'gta_san_andreas.png',
                'banner' => 'gta_san_andreas.png',
                'grid' => 'gta_san_andreas.png',
                'logo' => 'gta_san_andreas.png',
                'genres' => ['Action', 'Adventure', 'Open World']
            ],

            [
                'name' => 'Grand Theft Auto: Vice City',
                'description_en' => 'Relive the neon-drenched 80s in GTA: Vice City. Follow Tommy Vercetti’s rise to power in a city inspired by Miami, filled with crime, music, and nostalgia.',
                'description_pt' => 'Reviva os anos 80 cheios de neon em GTA: Vice City. Acompanhe a ascensão de Tommy Vercetti ao poder em uma cidade inspirada em Miami, repleta de crimes, música e nostalgia.',
                'id_publisher' => Publisher::where('name', 'Rockstar Games')->first()->id_publisher,
                'price' => 14.99,
                'release_date' => '2002-10-29',
                'icon' => 'gta_vice_city.png',
                'banner' => 'gta_vice_city.png',
                'grid' => 'gta_vice_city.png',
                'logo' => 'gta_vice_city.png',
                'genres' => ['Action', 'Adventure', 'Open World']
            ],

            [
                'name' => 'Hades',
                'description_en' => 'Battle your way out of the Underworld in Hades, a rogue-like dungeon crawler. Wield powerful weapons, forge relationships with gods, and discover a rich, ever-changing story.',
                'description_pt' => 'Lute para escapar do Submundo em Hades, um rogue-like dungeon crawler. Empunhe armas poderosas, construa relacionamentos com os deuses e descubra uma história rica e em constante evolução.',
                'id_publisher' => Publisher::firstOrCreate(
                    ['name' => 'Supergiant Games'],
                    ['email' => 'support@supergiantgames.com']
                )->id_publisher,
                'price' => 24.99,
                'release_date' => '2020-09-17',
                'icon' => 'hades.png',
                'banner' => 'hades.png',
                'grid' => 'hades.png',
                'logo' => 'hades.png',
                'genres' => ['Action', 'Roguelike', 'Indie']
            ],

            [
                'name' => 'Cuphead',
                'description_en' => 'Cuphead is a run-and-gun action game with a unique 1930s cartoon art style. Face off against challenging bosses, dodge deadly attacks, and perfect your timing in this beautifully animated classic.',
                'description_pt' => 'Cuphead é um jogo de ação run-and-gun com um estilo de arte único inspirado nos desenhos animados dos anos 1930. Enfrente chefes desafiadores, desvie de ataques mortais e aperfeiçoe seu tempo neste clássico animado.',
                'id_publisher' => Publisher::firstOrCreate(
                    ['name' => 'Studio MDHR'],
                    ['email' => 'contact@studiomdhr.com']
                )->id_publisher,
                'price' => 19.99,
                'release_date' => '2017-09-29',
                'icon' => 'cuphead.png',
                'banner' => 'cuphead.png',
                'grid' => 'cuphead.png',
                'logo' => 'cuphead.png',
                'genres' => ['Platformer', 'Action', 'Indie']
            ],

            [
                'name' => 'Metal Gear Rising: Revengeance',
                'description_en' => 'Metal Gear Rising: Revengeance delivers fast-paced hack and slash combat. Play as Raiden, a cyborg ninja, and take down powerful enemies in a high-octane, action-packed story.',
                'description_pt' => 'Metal Gear Rising: Revengeance oferece combates rápidos de hack and slash. Jogue como Raiden, um ninja ciborgue, e derrote inimigos poderosos em uma história cheia de ação e adrenalina.',
                'id_publisher' => Publisher::where('name', 'Konami')->first()->id_publisher,
                'price' => 29.99,
                'release_date' => '2013-02-19',
                'icon' => 'metal_gear_rising.png',
                'banner' => 'metal_gear_rising.png',
                'grid' => 'metal_gear_rising.png',
                'logo' => 'metal_gear_rising.png',
                'genres' => ['Action', 'Hack and Slash', 'Adventure']
            ],

            [
                'name' => 'Mario Kart 8',
                'description_en' => 'Race through gravity-defying tracks in Mario Kart 8. Use powerful items, master sharp drifts, and compete with friends in chaotic multiplayer races.',
                'description_pt' => 'Corra por pistas que desafiam a gravidade em Mario Kart 8. Use itens poderosos, domine curvas fechadas e compita com amigos em corridas multijogador caóticas.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 59.99,
                'release_date' => '2014-05-30',
                'icon' => 'mario_kart_8.png',
                'banner' => 'mario_kart_8.png',
                'grid' => 'mario_kart_8.png',
                'logo' => 'mario_kart_8.png',
                'genres' => ['Racing', 'Sports']
            ],

            [
                'name' => 'The Legend of Zelda: Majora\'s Mask',
                'description_en' => 'Relive the dark, time-bending adventure of Link in The Legend of Zelda: Majora\'s Mask. Save the world of Termina from destruction in just three in-game days.',
                'description_pt' => 'Reviva a sombria e misteriosa aventura de Link em The Legend of Zelda: Majora\'s Mask. Salve o mundo de Termina da destruição em apenas três dias no jogo.',
                'id_publisher' => Publisher::where('name', 'Nintendo')->first()->id_publisher,
                'price' => 39.99,
                'release_date' => '2000-10-26',
                'icon' => 'zelda_majoras_mask.png',
                'banner' => 'zelda_majoras_mask.png',
                'grid' => 'zelda_majoras_mask.png',
                'logo' => 'zelda_majoras_mask.png',
                'genres' => ['Adventure', 'RPG']
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
