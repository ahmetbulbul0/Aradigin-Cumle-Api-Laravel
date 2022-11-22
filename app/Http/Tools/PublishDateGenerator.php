<?php

namespace App\Http\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublishDateGenerator extends Controller
{
    static function multiple($data)
    {
        if ($data) {
            $count = count($data);
            for ($i = 0; $i < $count; $i++) {
                $data[$i]["publish_date"] = PublishDateGenerator::single($data[$i]["pbulish_date"]);
            }
            return $data;
        }
        return null;
    }
    static function single($publish_date)
    {
        $publishDate = [
            "text" => date("H:i:s - d.m.Y", $publish_date),
        ];
        $timeDistance = strtotime("now") - $publish_date;
        if ($timeDistance <= 60) {
            $secondDistance = $timeDistance;
            $publishDate["distanceText"] = $secondDistance . " Saniye Önce";
        } // for second distance
        if ($timeDistance > 60 && $timeDistance <= 3600) {
            $minuteDistance = intval($timeDistance / 60);
            if (($timeDistance % 60) > 0) {
                $minuteDistance++;
            }
            $publishDate["distanceText"] = $minuteDistance . " Dakika Önce";
        } // for minute distance
        if ($timeDistance > 3600 && $timeDistance <= 86400) {
            $hourDistance = intval($timeDistance / 3600);
            if (($timeDistance % 3600) > 0) {
                $hourDistance++;
            }
            $publishDate["distanceText"] = $hourDistance . " Saat Önce";
        } // for hour distance
        if ($timeDistance > 86400 && $timeDistance <= 604800) {
            $dayDistance = intval($timeDistance / 86400);
            if (($timeDistance % 86400) > 0) {
                $dayDistance++;
            }
            $publishDate["distanceText"] = $dayDistance . " Gün Önce";
        } // for day distance
        if ($timeDistance > 604800 && $timeDistance <= 18144000) {
            $weekDistance = intval($timeDistance / 604800);
            if (($timeDistance % 604800) > 0) {
                $weekDistance++;
            }
            $publishDate["distanceText"] = $weekDistance . " Hafta Önce";
        } // for week distance
        if ($timeDistance > 18144000 && $timeDistance <= 217728000) {
            $monthDistance = intval($timeDistance / 18144000);
            if (($timeDistance % 18144000) > 0) {
                $monthDistance++;
            }
            $publishDate["distanceText"] = $monthDistance . " Ay Önce";
        } // for month distance
        if ($timeDistance >= 217728000) {
            $yearDistance = intval($timeDistance / 217728000);
            if (($timeDistance % 217728000) > 0) {
                $yearDistance++;
            }
            $publishDate["distanceText"] = $yearDistance . " Yıl Önce";
        } // for year distance
        return $publishDate;
    }
}
