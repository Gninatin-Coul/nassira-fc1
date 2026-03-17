<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Nassira FC',
            'email' => 'admin@nassirafc.ci',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            RolesAndPermissionsSeeder::class,
            CategorySeeder::class,
            PlayerSeeder::class,
            ArticleSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
