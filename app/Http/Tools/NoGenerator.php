<?php

namespace App\Http\Tools;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use App\Models\ResourcePlatforms;
use App\Models\ResourceUrls;
use App\Models\UserPermissions;
use App\Models\Users;
use App\Models\UserSettings;
use App\Models\UserTypePermissions;
use App\Models\UserTypes;

class NoGenerator extends Controller
{
    static function generateCategoriesNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = Categories::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = Categories::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateNewsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = News::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = News::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateResourcePlatformsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = ResourcePlatforms::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = ResourcePlatforms::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateResourceUrlsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = ResourceUrls::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = ResourceUrls::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateUserPermissionsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = UserPermissions::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = UserPermissions::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateUsersNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = Users::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = Users::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateUserSettingsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = UserSettings::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = UserSettings::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateUserTypesNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = UserTypes::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = UserTypes::where(['no' => $no])->count();
        }
        return $no;
    }
    static function generateUserTypePermissionsNo() // length: 6
    {
        $no = rand(100000, 999999);
        $noCheck = UserTypePermissions::where(['no' => $no])->count();
        while ($noCheck == 1) {
            $no = rand(100000, 999999);
            $noCheck = UserTypePermissions::where(['no' => $no])->count();
        }
        return $no;
    }
}
