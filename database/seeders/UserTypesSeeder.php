<?php

namespace Database\Seeders;

use App\Models\UserTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserTypes::factory()
            ->count(1)
            ->state(['name' => 'system', 'slug' => 'system'])
            ->hasPermissionsData(1, function (array $attributes, UserTypes $userType) {
                return ['no' => $userType->permissions];
            })
            ->create();

        UserTypes::factory()
            ->count(1)
            ->state(['name' => 'author', 'slug' => 'author'])
            ->hasPermissionsData(1, function (array $attributes, UserTypes $userType) {
                return ['no' => $userType->permissions];
            })
            ->create();

        UserTypes::factory()
            ->count(1)
            ->state(['name' => 'editor', 'slug' => 'editor'])
            ->hasPermissionsData(1, function (array $attributes, UserTypes $userType) {
                return ['no' => $userType->permissions];
            })
            ->create();
    }
}
