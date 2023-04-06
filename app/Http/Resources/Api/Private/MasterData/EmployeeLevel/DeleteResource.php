<?php

namespace App\Http\Resources\Api\Private\MasterData\EmployeeLevel;

use Illuminate\Http\Resources\Json\JsonResource;

class DeleteResource extends JsonResource
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
            'success_message' => 'Successfully delete employee level',
            'error_message' => '',
            'action_client' => '',
        ];
    }
}
