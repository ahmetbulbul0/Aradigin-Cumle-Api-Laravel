<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\UserTypesSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\ResourcePlatformsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserTypesSeeder::class,
            UsersSeeder::class,
            CategoriesSeeder::class,
            ResourcePlatformsSeeder::class,
            NewsSeeder::class
        ]);
    }
}
