<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Victoire éclatante des U15 contre l\'Académie Sol Béni',
                'slug' => Str::slug('Victoire éclatante des U15 contre l\'Académie Sol Béni'),
                'content' => 'Nos jeunes pépites ont brillé ce weekend avec une victoire 3-0. Un doublé de notre attaquant de pointe et une solidité défensive exemplaire ont permis ce succès historique.',
                'image_url' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=2093&auto=format&fit=crop',
                'published_at' => now(),
            ],
            [
                'title' => 'Inauguration du nouveau terrain synthétique',
                'slug' => Str::slug('Inauguration du nouveau terrain synthétique'),
                'content' => 'Le centre Nassira FC se dote d\'une nouvelle infrastructure de pointe. Ce nouveau terrain permettra des entraînements de haute qualité par tous les temps.',
                'image_url' => 'https://images.unsplash.com/photo-1529900948633-1ec6965576bd?q=80&w=2070&auto=format&fit=crop',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Camp d\'été : Inscriptions ouvertes !',
                'slug' => Str::slug('Camp d\'été : Inscriptions ouvertes !'),
                'content' => 'Rejoignez-nous pour deux semaines intensives de football et de partage. Ouvert à tous les niveaux de 8 à 16 ans.',
                'image_url' => 'https://images.unsplash.com/photo-1517466787929-bc90951d0974?q=80&w=1972&auto=format&fit=crop',
                'published_at' => now()->subDays(5),
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
