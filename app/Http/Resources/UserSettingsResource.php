<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSettingsResource extends JsonResource
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
            "userNo" => $this->user_no,
            "isPublic" => $this->is_public,
            "profilePhoto" => $this->profile_photo,
            "websiteTheme" => $this->website_theme,
            "dashboardTheme" => $this->dashboard_theme
        ];
    }
}
