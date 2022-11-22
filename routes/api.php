<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\LoginController;
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
// Auth Routes End

// Private Api Route's Start
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
// Private Api Route's End
