<?php

namespace App\Http\Tools;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class SortingListGenerator extends Controller
{
    static function sortingListGenerate($sortingNames)
    {
        foreach ($sortingNames as $name) {
            if (Str::endsWith($name, "09")) {
                $listTypes[] = [
                    "requestName" => $name,
                    "column" => Str::remove('09', Str::snake($name)),
                    "dbSortingType" => "ASC"
                ];
            }
            if (Str::endsWith($name, "90")) {
                $listTypes[] = [
                    "requestName" => $name,
                    "column" => Str::remove('90', Str::snake($name)),
                    "dbSortingType" => "DESC"
                ];
            }
            if (Str::endsWith($name, "AZ")) {
                $listTypes[] = [
                    "requestName" => $name,
                    "column" => Str::remove('AZ', Str::snake($name)),
                    "dbSortingType" => "ASC"
                ];
            }
            if (Str::endsWith($name, "ZA")) {
                $listTypes[] = [
                    "requestName" => $name,
                    "column" => Str::remove('ZA', Str::snake($name)),
                    "dbSortingType" => "DESC"
                ];
            }
        }

        return $listTypes;
    }
}
