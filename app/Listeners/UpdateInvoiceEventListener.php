<?php

namespace avaluestay\Listeners;

use avaluestay\Contracts\InvoiceInterface;
use avaluestay\Events\UserSubscription;

class UpdateInvoiceEventListener
{
    /**
     * @var \avaluestay\Contracts\InvoiceInterface
     */
    private $invoice;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(InvoiceInterface $invoice)
    {
        //
        $this->invoice = $invoice;
    }

    /**
     * Handle the event.
     *
     * @param  UserSubscription $event
     * @return void
     */
    public function handle(UserSubscription $event)
    {
        $invoice = $this->invoice->where("orderRef", "=", $event->data["Ref"])->first();
        if ($invoice) {
            $invoice->status = "paid";
            $invoice->save();
        } else {
            $this->invoice->payee_id = $event->data["payeeId"];
            $this->invoice->seller_id = $event->data["sellerId"];
            $this->invoice->price = $event->data["price"];
            $this->invoice->quantity = $event->data["quantity"];
            $this->invoice->type = $event->data["type"];
            $this->invoice->orderRef = $event->data["Ref"];
            $this->invoice->status = "paid";
            $this->invoice->currency_id = env("BASE_CURRENCY_CODE");
            $this->invoice->save();
        }
    }
}
