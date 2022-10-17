<?php

namespace App\Http\Resources;

use App\Http\Resources\UsersResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPermissionsResource extends JsonResource
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
            "userData" => $this->userData,
            "isBanned" => $this->is_banned
        ];
    }
}
