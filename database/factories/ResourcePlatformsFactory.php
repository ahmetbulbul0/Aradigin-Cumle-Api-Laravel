<?php

namespace Database\Factories;

use App\Http\Tools\NoGenerator;
use App\Http\Tools\SlugGenerator;
use App\Models\ResourcePlatforms;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResourcePlatforms>
 */
class ResourcePlatformsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $no = NoGenerator::generateResourcePlatformsNo();
        $name = $this->faker->company();

        $nameCheck = ResourcePlatforms::where(['name' => $name])->count();
        while ($nameCheck == 1) {
            $name = $this->faker->company();
            $nameCheck = ResourcePlatforms::where(['name' => $name])->count();
        }

        $mainUrl = $this->faker->domainName();

        $mainUrlCheck = ResourcePlatforms::where(['main_url' => $mainUrl])->count();
        while ($mainUrlCheck == 1) {
            $mainUrl = $this->faker->domainName();
            $mainUrlCheck = ResourcePlatforms::where(['main_url' => $mainUrl])->count();
        }

        $slug = SlugGenerator::single($name);

        return [
            "no" => $no,
            "name" => $name,
            "main_url" => $mainUrl,
            "slug" => $slug
        ];
    }
}
