<?php

namespace App\Http\Tools;

use App\Http\Controllers\Controller;

class EloquentGenerator extends Controller
{
    static function orderByWithSortingList($request, $data, $sortingList)
    {
        foreach ($sortingList as $sorting) {
            if ($sorting["requestName"] == $request->sorting) {
                $data = $data->orderBy($sorting["column"], $sorting["dbSortingType"]);
            }
        }

        return $data;
    }
}
