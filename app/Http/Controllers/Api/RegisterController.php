<?php

namespace App\Http\Controllers\Api;

use App\Models\Users;
use Illuminate\Support\Str;
use App\Models\UserSettings;
use App\Http\Tools\NoGenerator;
use App\Models\UserPermissions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index(RegisterRequest $request)
    {
        $username = $request->username;
        $fullName = $request->fullName;
        $password = $request->password;
        $type = $request->type;

        $no = NoGenerator::generateUsersNo();

        $data = [
            "no" => $no,
            "username" => Str::lower($username),
            "full_name" => Str::lower($fullName),
            "password" => Hash::make($password),
            "type" => intval($type)
        ];

        $userSettingsData = [
            "no" => NoGenerator::generateUserSettingsNo(),
            "user_no" => $no,
        ];
        UserSettings::create($userSettingsData);
        $data["settings"] = $userSettingsData["no"];

        $userPermissionsData = [
            "no" => NoGenerator::generateUserPermissionsNo(),
            "user_no" => $no,
        ];
        UserPermissions::create($userPermissionsData);
        $data["permissions"] = $userPermissionsData["no"];

        $user = Users::create($data);

        $credentials = [
            "username" => $username,
            "password" => $password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $token = $user->createToken('token')->plainTextToken;

            $response = [
                "status" => 200,
                "token" => $token
            ];
        } else {
            $response = [
                "status" => 404
            ];
        }

        return $response;
    }
}
