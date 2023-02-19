<?php

namespace App\Listeners;

use App\Models\Client;
use App\Models\Restaurant;
use App\Events\OrderCreation;
use App\Notifications\OrderCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NotifyRestaurantOnOrderCreation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCreation  $event
     * @return void
     */
    public function handle(OrderCreation $event)
    {
        $order = $event->getOrder();
        $restaurant = Restaurant::find($order->restaurant_id);
        $restaurant->notify(new OrderCreated($order));
          
    }
}
