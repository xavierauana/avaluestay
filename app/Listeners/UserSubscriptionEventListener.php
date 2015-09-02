<?php

namespace avaluestay\Listeners;

use avaluestay\Contracts\InvoiceInterface;
use avaluestay\Events\UserSubscription;
use avaluestay\User;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserSubscriptionEventListener
{
    /**
     * @var \avaluestay\Listeners\User
     */
    private $user;
    private $invoice;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  UserSubscription  $event
     * @return void
     */
    public function handle(UserSubscription $event)
    {
        $user = $this->user->findOrFail($event->data['payeeId']);

        $user->type = $event->data['package'];

        if($event->data['package'] == "suser"){
            if($user->expiry_date->gt(Carbon::now())){
                $user->expiry_date = $user->expiry_date->addYears(1);
            }else{
                $user->expiry_date = Carbon::now()->addYears(1);
            }
        }

        if($event->data['package'] == "cuser"){
            $user->credit = $user->credit + $event->data['quantity'];
        }

        $user->save();

    }
}
