<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::factory()
            ->count(25)
            ->hasPermissionsData(1, function (array $attributes, Users $user) {
                return ['no' => $user->permissions];
            })
            ->hasSettingsData(1, function (array $attributes, Users $user) {
                return ['no' => $user->settings];
            })
            ->create();
    }
}
