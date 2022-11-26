<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogOutController;
use App\Http\Controllers\Api\RegisterController;

// Public Api Route's Start
Route::prefix("public")->group(function () {
    Route::get('news', [NewsController::class, "publicIndex"]);
    Route::get('news/{news}', [NewsController::class, "publicShow"]);
});
// Public Api Route's End

// Auth Routes Start
Route::post('login', [LoginController::class, "index"]);
Route::post('register', [RegisterController::class, "index"]);
Route::post('log-out', [LogOutController::class, "index"])->middleware("auth:sanctum");
Route::get('user', function (Request $request) {
    return $request->user();
})->middleware("auth:sanctum");
// Auth Routes End

// Private Api Route's Start
Route::group(['middleware' => 'auth:sanctum', 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::apiResource('user-types', UserTypesController::class);
    Route::apiResource('user-type-permissions', UserTypePermissionsController::class);
    Route::apiResource('users', UsersController::class);
    Route::apiResource('user-permissions', UserPermissionsController::class);
    Route::apiResource('user-settings', UserSettingsController::class);
    Route::apiResource('categories', CategoriesController::class);
    Route::apiResource('resource-platforms', ResourcePlatformsController::class);
    Route::apiResource('resource-urls', ResourceUrlsController::class);
    Route::apiResource('news', NewsController::class);
});
// Private Api Route's End
