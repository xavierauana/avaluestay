<?php

namespace avaluestay\Listeners;

use avaluestay\Events\MakeABooking;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingEventListener
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
     * @param  MakeABooking  $event
     * @return void
     */
    public function handle(MakeABooking $event)
    {
        //
    }
}
