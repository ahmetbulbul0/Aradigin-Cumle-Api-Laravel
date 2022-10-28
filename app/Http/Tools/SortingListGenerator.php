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
                $sortingListItem = [
                    "requestName" => $name,
                    "column" => Str::remove('09', $name),
                    "dbSortingType" => "ASC"
                ];
                $sortingListItem["column"] = Str::snake($sortingListItem["column"]);
                $sortingList[] = $sortingListItem;
            }
            if (Str::endsWith($name, "90")) {
                $sortingListItem = [
                    "requestName" => $name,
                    "column" => Str::remove('90', $name),
                    "dbSortingType" => "DESC"
                ];
                $sortingListItem["column"] = Str::snake($sortingListItem["column"]);
                $sortingList[] = $sortingListItem;
            }
            if (Str::endsWith($name, "AZ")) {
                $sortingListItem = [
                    "requestName" => $name,
                    "column" => Str::remove('AZ', $name),
                    "dbSortingType" => "ASC"
                ];
                $sortingListItem["column"] = Str::snake($sortingListItem["column"]);
                $sortingList[] = $sortingListItem;
            }
            if (Str::endsWith($name, "ZA")) {
                $sortingListItem = [
                    "requestName" => $name,
                    "column" => Str::remove('ZA', $name),
                    "dbSortingType" => "DESC"
                ];
                $sortingListItem["column"] = Str::snake($sortingListItem["column"]);
                $sortingList[] = $sortingListItem;
            }
        }
        return $sortingList;
    }
}
