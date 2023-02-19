<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
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
            "image" => $this->image,
            "description" => $this->description,
            "price" => $this->price,
            "offer_price" => $this->offer_price,
            "time" => $this->time,
            "restaurant" => new RestaurantResource($this->whenLoaded('restaurant')),
        ];
    }
}
