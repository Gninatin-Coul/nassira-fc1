<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'U10', 'description' => 'Formation poussins. Apprentissage des bases du football.'],
            ['name' => 'U12', 'description' => 'Développement de la technique individuelle et coordination psychomotrice.'],
            ['name' => 'U15', 'description' => 'Préformation, introduction aux aspects tactiques et jeu collectif.'],
            ['name' => 'U18', 'description' => 'Formation sportive avancée et préparation aux compétitions de haut niveau.'],
            ['name' => 'Équipe Pro', 'description' => 'L\'équipe première du centre de formation professionnelle Nassira FC.'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
