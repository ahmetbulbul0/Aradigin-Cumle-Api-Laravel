<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::apiResource('user-types', UserTypesController::class)->middleware("auth:sanctum");
    Route::apiResource('user-type-permissions', UserTypePermissionsController::class)->middleware("auth:sanctum");
    Route::apiResource('users', UsersController::class)->middleware("auth:sanctum");
    Route::apiResource('user-permissions', UserPermissionsController::class)->middleware("auth:sanctum");
    Route::apiResource('user-settings', UserSettingsController::class)->middleware("auth:sanctum");
    Route::apiResource('categories', CategoriesController::class)->middleware("auth:sanctum");
    Route::apiResource('resource-platforms', ResourcePlatformsController::class)->middleware("auth:sanctum");
    Route::apiResource('resource-urls', ResourceUrlsController::class)->middleware("auth:sanctum");
    Route::apiResource('news', NewsController::class)->middleware("auth:sanctum");
});

Route::post('login', [LoginController::class, "index"]);
Route::post('register', [RegisterController::class, "index"]);
Route::get('public/news', [NewsController::class, "publicIndex"]);
