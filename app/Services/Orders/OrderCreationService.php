<?php

namespace App\Services\Orders;

use Exceptions;
use App\Models\Meal;
use App\Models\Setting;
use App\Models\Restaurant;
use App\Events\OrderCreation;
use Illuminate\Support\Facades\DB;
use App\Exceptions\NotAvailableException;
use App\Exceptions\OrderCalculationException;
use App\Exceptions\LessThanMinimumChargeException;

class OrderCreationService
{
    public function createOrder($request)
    {
        $restaurant = Restaurant::find($request['restaurant_id']);
        if($restaurant->isActive() == 'closed')
        {
            throw new NotAvailableException;
        }
        try{
            DB::transaction(function () use($restaurant, $request) {
                $order = auth()->user()->orders()->create($request);
                $cost = 0 ;
                $deliveryCharge = $restaurant->delivery_charge;
                foreach ($request['meals'] as $m)
                {
                    $meal = Meal::find($m['meal_id']);
                    $readyMeal = [
                        $m['meal_id'] => [
                            'quantity' => $m['quantity'],
                            'price'    => $meal->price,
                            'note'     => $request['note']
                        ]
                    ];
                    $order->meals()->attach($readyMeal);
                    $cost += $meal->price * $m['quantity'];
                }
                if($cost >= $restaurant->minimum_order )
                {
                    $totalCost = $cost + $deliveryCharge ;
                    $commission = Setting::getAppCommission() * $cost;
                    $net = $totalCost -  Setting::getAppCommission() ;
                    $updatedOrder = $order->update([
                    'cost' => $cost ,
                    'delivery_charge' => $deliveryCharge,
                    'total_cost' => $totalCost,
                    'commission' => $commission ,
                    'net' => $net
                    ]);
                    if(! $updatedOrder)
                    {
                        $order->meals()->detach($readyMeal);
                        $order->delete();
                        throw new OrderCalculationException ;
                        
                    }else{
                       event(new OrderCreation($order));
                        return $order->fresh();
                    }
                }else {
                    
                    $order->meals()->delete();
                    $order->delete();
                    throw new LessThanMinimumChargeException;
                }
            });
        }catch (\Exceptions $e){
            return "error happened".$e->getMessage();
        }
    }

}