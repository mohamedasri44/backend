<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientSdaResource extends JsonResource
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
            'clientId' => $this->client->id,
            'number' => $this->sda->number,
            'clientName' => $this->client->name,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end
        ];
    }
}
