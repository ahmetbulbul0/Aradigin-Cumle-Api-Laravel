<?php

namespace App\Http\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class LimitGenerator extends Controller
{
    static function generateLimitAndGet($request, $data)
    {
        if ($request->limit) {
            $limit = $request->limit;
            $limit = intval($limit);
            if ($limit != 0) {
                $data = $data->limit($limit);
            }
        }
        $data = $data->get();
        return $data;
    }
}
