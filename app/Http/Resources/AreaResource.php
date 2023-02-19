<?php

namespace App\Http\Resources;

use App\Http\Resources\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
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
            "id" => (string) $this->id,
                "name" => $this->name,
                "city" => new CityResource($this->whenLoaded('city'))
            
        ];
    }
}
