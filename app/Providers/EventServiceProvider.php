<?php

namespace avaluestay\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'avaluestay\Events\Notification' => [
            'avaluestay\Listeners\NotificationEventListener',
        ],
        'avaluestay\Events\UserSubscription' => [
            'avaluestay\Listeners\UserSubscriptionEventListener',
            'avaluestay\Listeners\UpdateInvoiceEventListener',
        ],
        'avaluestay\Events\MakeABooking' => [
            'avaluestay\Listeners\BookingEventListener',
        ],
        'avaluestay\Events\ConfirmBooking' => [
            'avaluestay\Listeners\BookingEventListener',
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
