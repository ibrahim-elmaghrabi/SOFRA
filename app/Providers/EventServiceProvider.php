<?php

namespace App\Providers;

use App\Events\OrderAccepted;
use App\Events\OrderCreation;
use App\Events\OrderDeclined;
use App\Events\OrderRejected;
use App\Events\OrderDelivered;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\NotifyClientOnOrderAccepted;
use App\Listeners\NotifyClientOnOrderRejected;
use App\Listeners\NotifyClientOnOrderDelivered;
use App\Listeners\NotifyRestaurantOnOrderCreation;
use App\Listeners\NotifyRestaurantOnOrderDeclined;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCreation::class => [
            NotifyRestaurantOnOrderCreation::class
        ],
        OrderAccepted::class=>[
            NotifyClientOnOrderAccepted::class
        ],
        OrderDelivered::class=>[
            NotifyClientOnOrderDelivered::class
        ],
        OrderRejected::class=>[
            NotifyClientOnOrderRejected::class
        ],
        OrderDeclined::class=>[
            NotifyRestaurantOnOrderDeclined::class
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
