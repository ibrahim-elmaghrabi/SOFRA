<?php

namespace App\Listeners;

use App\Models\Client;
use App\Models\Restaurant;
use App\Events\OrderAccepted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyClientOnOrderAccepted
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
     * @param  \App\Events\OrderAccepted  $event
     * @return void
     */
    public function handle(OrderAccepted $event)
    {
        $order = $event->getOrder();
        $client=Client::find($order->client_id);
        $restaurant = Restaurant::find($order->restaurant_id);
        $client->notify(new \App\Notifications\OrderAccepted($restaurant));

        
    }
}
