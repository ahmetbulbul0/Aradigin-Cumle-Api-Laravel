<?php

namespace Database\Seeders;

use App\Models\ResourcePlatforms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourcePlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResourcePlatforms::factory()
            ->count(10)
            ->create();
    }
}
