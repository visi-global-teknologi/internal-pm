<?php

namespace App\Http\Resources\Api\Private\Acl\Role\Permission;

use Illuminate\Http\Resources\Json\JsonResource;

class RevokeResource extends JsonResource
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
            'status' => true,
            'http_code' => 200,
            'data' => [],
            'success_message' => 'Successfully revoke permission',
            'error_message' => '',
            'action_client' => ''
        ];
    }
}
