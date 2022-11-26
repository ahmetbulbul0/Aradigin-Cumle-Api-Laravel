<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();

        $response = [
            "status" => 200
        ];

        return $response;
    }
}
