<?php

namespace App\Http\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class RelationshipGenerator extends Controller
{
    static function hasRelationshipInRequest($request, $relationships, $data)
    {
        switch (gettype($relationships)) {
            case 'array':
                foreach ($relationships as $relationship) {
                    $reqRelationName = Str::camel("has_" . $relationship);
                    if ($request->$reqRelationName) {
                        $data = $data->with($relationship);
                    }
                }
                break;
            case 'string':
                $reqRelationName = Str::camel("has_" . $relationships);
                if ($request->$reqRelationName) {
                    $data = $data->with($relationships);
                }
                break;
            default:
                $data = $data;
                break;
        }
        return $data;
    }

    static function addRelationship($relationships, $data)
    {
        switch (gettype($relationships)) {
            case 'array':
                foreach ($relationships as $relationship) {
                    $data = $data->with($relationship);
                }
                break;
            case 'string':
                $data = $data->with($relationships);
                break;
            default:
                $data = $data;
                break;
        }
        return $data;
    }
}
