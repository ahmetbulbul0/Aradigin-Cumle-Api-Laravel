<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
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
