<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Construction de la nouvelle résidence académique',
                'description' => 'Un projet ambitieux pour offrir à nos jeunes joueurs un cadre de vie et d\'études d\'excellence directement au sein du centre.',
                'status' => 'en cours',
                'goal' => '60 chambres équipées',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop',
            ],
            [
                'name' => 'Partenariat International : Échange avec l\'Europe',
                'description' => 'Mise en place de ponts avec des clubs européens pour permettre à nos meilleurs éléments de découvrir le très haut niveau.',
                'status' => 'terminé',
                'goal' => '3 clubs partenaires signés',
                'image_url' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
