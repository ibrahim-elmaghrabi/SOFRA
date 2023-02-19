<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
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
            "title" => $this->title,
            "offer" => $this->offer,
            "image" => $this->image,
            "start date" => $this->start_date,
            "end date" => $this->end_date,
            "restaurant"=> new RestaurantResource($this->whenLoaded('restaurant'))
        ];
    }
}
