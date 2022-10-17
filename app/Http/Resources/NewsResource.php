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
            "author" => $this->authorData ? new UsersResource($this->whenLoaded("authorData")) : $this->author,
            "category" => $this->categoryData ? new CategoriesResource($this->whenLoaded("categoryData")) : $this->category,
            "resourcePlatform" => $this->resourcePlatformData ? new ResourcePlatformsResource($this->whenLoaded("resourcePlatformData")) : $this->resourcePlatform,
            "resourceUrl" => $this->resourceUrlData ? new ResourceUrlsResource($this->whenLoaded("resourceUrlData")) : $this->resourceUrl,
            "addedTime" => $this->added_time,
            "publishStatus" => $this->publish_status,
            "publishDate" => $this->publish_date,
            "status" => $this->status,
            "slug" => $this->slug,
            "isApproved" => $this->is_approved,
            "approvedAt" => $this->approved_at,
            "approvedBy" => $this->approvedByData ? new UsersResource($this->whenLoaded("approvedByData")) : $this->approvedBy,
            "isRejected" => $this->is_rejected,
            "rejectedAt" => $this->rejected_at,
            "rejectedBy" => $this->rejectedByData ? new UsersResource($this->whenLoaded("rejectedByData")) : $this->rejectedBy,
            "rejectedReason" => $this->rejected_reason
        ];
    }
}
