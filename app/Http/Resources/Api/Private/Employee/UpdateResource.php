<?php

namespace App\Http\Resources\Api\Private\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdateResource extends JsonResource
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
            'success_message' => 'Successfully update employee',
            'error_message' => '',
            'action_client' => '',
        ];
    }
}
