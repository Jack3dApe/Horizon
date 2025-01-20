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
