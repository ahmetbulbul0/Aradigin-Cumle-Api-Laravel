<?php

use App\Models\News;
use App\Models\Users;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return Users::with("type", "permissions", "settings", "news")->get();
    // return Categories::with("parentCategory", "childrenCategories")->get();
    return News::with("author", "category", "resourcePlatform", "resourceUrl", "approvedBy", "rejectedBy")->get();
});
