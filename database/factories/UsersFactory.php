<?php

namespace Database\Factories;

use App\Http\Tools\NoGenerator;
use App\Models\Users;
use App\Models\UserTypes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userTypes = [];
        foreach (UserTypes::all() as $t ) {
            $userTypes[] = $t->no;
        }

        $no = NoGenerator::generateUsersNo();
        $username = $this->faker->userName();

        $usernameCheck = Users::where(['username' => $username])->count();
        while ($usernameCheck == 1) {
            $username = $this->faker->userName();
            $usernameCheck = Users::where(['username' => $username])->count();
        }

        $fullName = $this->faker->firstName()." ".$this->faker->lastName();
        $password = Hash::make("facetoface");
        $type = $this->faker->randomElement($userTypes);
        $settings = NoGenerator::generateUserSettingsNo();
        $permissions = NoGenerator::generateUserPermissionsNo();

        return [
            "no" => $no,
            "username" => $username,
            "full_name" => $fullName,
            "password" => $password,
            "type" => $type,
            "settings" => $settings,
            "permissions" => $permissions
        ];
    }
}
