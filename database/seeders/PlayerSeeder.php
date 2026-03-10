<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Category;
use Faker\Factory as Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_CI'); // Locale France/Côte d'Ivoire (Noms francisés)
        
        $categories = Category::pluck('id')->toArray();
        $positions = ['Gardien', 'Défenseur', 'Milieu', 'Attaquant'];

        // Si la base n'a pas de catégories pour une raison quelconque, on s'assure d'avoir des IDs bidons
        if (empty($categories)) {
            $categories = [1, 2, 3, 4, 5]; 
        }

        for ($i = 0; $i < 40; $i++) {
            Player::create([
                'category_id' => $faker->randomElement($categories),
                'first_name' => $faker->firstNameMale(),
                'last_name' => $faker->lastName(),
                'birth_date' => $faker->dateTimeBetween('-22 years', '-9 years')->format('Y-m-d'),
                'position' => $faker->randomElement($positions),
                'bio' => $faker->paragraph(2),
                // Pseudo photos de joueurs (Aléatoires)
                'photo_url' => 'https://i.pravatar.cc/300?img=' . $faker->numberBetween(1, 70),
            ]);
        }
    }
}
