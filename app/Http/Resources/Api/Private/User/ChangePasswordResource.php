<?php

namespace App\Http\Resources\Api\Private\User;

use Illuminate\Http\Resources\Json\JsonResource;

class ChangePasswordResource extends JsonResource
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
            'success_message' => 'Successfully changed password',
            'error_message' => '',
            'action_client' => ''
        ];
    }
}
