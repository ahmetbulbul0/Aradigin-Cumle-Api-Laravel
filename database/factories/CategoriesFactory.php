<?php

namespace Database\Factories;

use App\Http\Tools\NoGenerator;
use App\Http\Tools\SlugGenerator;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = [];
        foreach (Categories::all() as $t ) {
            $categories[] = $t->no;
        }

        $no = NoGenerator::generateCategoriesNo();
        $name = $this->faker->word();

        $nameCheck = Categories::where(['name' => $name])->count();
        while ($nameCheck == 1) {
            $name = $this->faker->word();
            $nameCheck = Categories::where(['name' => $name])->count();
        }

        $slug = SlugGenerator::single($name);

        if (count($categories) > 0) {
            $isChildren = $this->faker->boolean();
            $isParent = $isChildren ? false : true;
            $parentCategory = $isChildren ? $this->faker->randomElement($categories) : null;
        } else {
            $isChildren = false;
            $isParent = true;
            $parentCategory = null;
        }

        return [
            "no" => $no,
            "name" => $name,
            "slug" => $slug,
            "is_children" => $isChildren,
            "is_parent" => $isParent,
            "parent_category" => $parentCategory
        ];
    }
}
