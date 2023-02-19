<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            "comment" => $this->comment,
            'rate' => $this->rate,
            'restaurant' => new RestaurantResource($this->whenLoaded('restaurant')),
            'client' => new ClientResource($this->whenLoaded('client')),
        ];
    }
}
