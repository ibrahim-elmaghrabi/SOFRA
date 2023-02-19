<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            "id" => (string)$this->id,
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "image" => $this->image,
            "delivery_charge" => $this->delivery_charge,
            "minimum_order" => $this->minimum_order,
            "delivery_phone" => $this->delivery_phone,
            "delivery_whatsapp" => $this->delivery_whatsapp,
            "area" => $this->area->name,
            "category" => CategoryResource::collection($this->whenLoaded('categories'))
        ];
    }
}
