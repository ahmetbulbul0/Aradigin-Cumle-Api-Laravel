<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PublicUsersResource;
use App\Models\UserPermissions;
use App\Models\UserTypePermissions;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $username = htmlspecialchars($request->username);
        $password = htmlspecialchars($request->password);

        $credentials = [
            "username" => $username,
            "password" => $password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $typePermissions = UserTypePermissions::where("user_type_no", $user->type)->first()->toArray();
            $userPermissions = UserPermissions::where("user_no", $user->no)->first()->toArray();

            $permissions = array_merge($typePermissions, $userPermissions);

            $token = $user->createToken('token', $permissions)->plainTextToken;

            $user = new PublicUsersResource($user);

            $response = [
                "status" => 200,
                "user" => $user,
                "token" => $token,
            ];
        } else {
            $response = [
                "status" => 404
            ];
        }

        return $response;
    }
}
