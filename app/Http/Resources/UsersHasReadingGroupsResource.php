<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersHasReadingGroupsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->users_user_id,
            'group_id' => $this->reading_groups_reading_group_id,
        ];
    }
}