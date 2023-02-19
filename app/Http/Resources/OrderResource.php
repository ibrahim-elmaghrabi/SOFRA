<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "created at" => $this->created_at,
            "address" => $this->address,
            "delivery charge" => $this->delivery_charge,
            "app commission" => $this->app_commission,
            "state" => $this->state,
            "total cost" => $this->total_cost,
            "note" => $this->note,
            "name email" => $this->client->email,
            "restaurant id" => (string) $this->restaurant->id,
            "name" => $this->restaurant->name,
            "payment method" => $this->paymentMethod->name
        ];
    }
}
