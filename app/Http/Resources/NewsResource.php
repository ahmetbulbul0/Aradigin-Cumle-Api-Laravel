<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "no" => $this->no,
            "title" => $this->title,
            "content" => $this->content,
            "author" => $this->author,
            "category" => $this->category,
            "resourcePlatform" => $this->resource_platform,
            "resourceUrl" => $this->resource_url,
            "addedTime" => $this->added_time,
            "publishStatus" => $this->publish_status,
            "publishDate" => $this->publish_date,
            "status" => $this->status,
            "slug" => $this->slug,
            "isApproved" => $this->is_approved,
            "approvedAt" => $this->approved_at,
            "approvedBy" => $this->approved_by,
            "isRejected" => $this->is_rejected,
            "rejectedAt" => $this->rejected_at,
            "rejectedBy" => $this->rejected_by,
            "rejectedReason" => $this->rejected_reason
        ];
    }
}
