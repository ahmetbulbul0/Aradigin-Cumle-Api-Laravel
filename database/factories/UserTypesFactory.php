<?php

namespace Database\Factories;

use App\Http\Tools\NoGenerator;
use App\Http\Tools\SlugGenerator;
use App\Models\UserTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTypes>
 */
class UserTypesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->word();

        $nameCheck = UserTypes::where(['name' => $name])->count();
        while ($nameCheck == 1) {
            $name = $this->faker->word();
            $nameCheck = UserTypes::where(['name' => $name])->count();
        }

        $slug = SlugGenerator::single($name);

        return [
            "no" => NoGenerator::generateUserTypesNo(),
            "name" => $name,
            "slug" => $slug,
            "permissions" => NoGenerator::generateUserTypePermissionsNo()
        ];
    }
}
