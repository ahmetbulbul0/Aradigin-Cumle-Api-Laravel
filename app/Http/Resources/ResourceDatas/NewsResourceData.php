<?php

namespace App\Http\Resources\ResourceDatas;

class NewsResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "title" => $thisData->title,
            "content" => $thisData->content,
            "addedTime" => $thisData->added_time,
            "publishStatus" => $thisData->publish_status,
            "publishDate" => $thisData->publish_date,
            "status" => $thisData->status,
            "slug" => $thisData->slug,
            "isApproved" => $thisData->is_approved,
            "approvedAt" => $thisData->approved_at,
            "isRejected" => $thisData->is_rejected,
            "rejectedAt" => $thisData->rejected_at,
            "rejectedReason" => $thisData->rejected_reason
        ];

        return $data;
    }
}
