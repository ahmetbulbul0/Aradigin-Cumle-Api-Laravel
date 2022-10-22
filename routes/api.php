<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
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
