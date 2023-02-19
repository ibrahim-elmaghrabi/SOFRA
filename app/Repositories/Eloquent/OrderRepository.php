<?php

namespace App\Repositories\Eloquent;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Restaurant;
use App\Events\OrderCreation;
use App\Repositories\Contracts\OrderRepositoryContract;
use App\Repositories\Eloquent\BasicRepository;

class OrderRepository extends BasicRepository implements OrderRepositoryContract
{
    public function entity()
    {
        return Order::class;
    }

    public function allOrders($user, $request,string $key)
    {
        return  $this->entity->where($user, auth()->user()->id)
        ->where(function ($q) use($request, $key){
            if($request->has($key)){
               $q->where($key, $request[$key]);
            }
         })->get();
    }

    
}
