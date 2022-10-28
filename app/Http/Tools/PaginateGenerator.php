<?php

namespace App\Http\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PaginateGenerator extends Controller
{
    static function paginate($data, $page, $itemPerPage) {
        $dataNumber = count($data->get());

        $TotalPageNumber = PaginateGenerator::getTotalPageNumber($dataNumber, $itemPerPage);

        $offsetValue = ($page * $itemPerPage) - $itemPerPage;

        $data = $data->limit($itemPerPage);
        $data = $data->offset($offsetValue);
        $data = $data->get();

        $response["data"] = $data;

        $response["pagination"] = [
            "nowPage" => $page,
            "previousPage" => $page > 1 ? $page - 1 : null,
            "previousPreviousPage" => $page > 2 ? $page - 2 : null,
            "nextPage" => $page < $TotalPageNumber ? $page + 1 : null,
            "nextNextPage" => $page + 1 < $TotalPageNumber ? $page + 2 : null,
            "totalPageNumber" => $TotalPageNumber,
        ];

        return $response;
    }

    static function getTotalPageNumber($dataNumber, $itemPerPage)
    {
        $totalPageNumber = 1;
        if ($dataNumber > $itemPerPage) {
            $totalPageNumber = intval($dataNumber / $itemPerPage);
            if (($dataNumber % $itemPerPage) > 0) {
                $totalPageNumber++;
            }
        }
        return $totalPageNumber;
    }
}
