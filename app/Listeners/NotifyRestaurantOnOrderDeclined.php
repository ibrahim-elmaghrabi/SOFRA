<?php

namespace App\Listeners;

use App\Models\Restaurant;
use App\Events\OrderDeclined;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyRestaurantOnOrderDeclined
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
     * @param  \App\Events\OrderDeclined  $event
     * @return void
     */
    public function handle(OrderDeclined $event)
    {
        $order = $event->getOrder();
        $restaurant = Restaurant::find($order->restaurant_id);
        $restaurant->notify(new \App\Notifications\OrderDeclined($order));
    }
}
