<?php

namespace Database\Factories;

use App\Models\ResourceUrls;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResourceUrls>
 */
class ResourceUrlsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $url = $this->faker->domainName();

        $urlCheck = ResourceUrls::where(['url' => $url])->count();
        while ($urlCheck == 1) {
            $url = $this->faker->domainName();
            $urlCheck = ResourceUrls::where(['url' => $url])->count();
        }

        return [
            "url" => $url
        ];
    }
}
