<?php

namespace avaluestay\Jobs;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInvoicePaidEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    /**
     * @type
     */
    private $Ref;

    /**
     * Create a new job instance.
     *
     * @param $Ref
     */
    public function __construct($Ref)
    {
        //
        $this->Ref = $Ref;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.booking', ['orderRef' => $this->Ref], function ($m) {
            $m->to('xavier.au@gmail.com', 'Xavier At avs')->subject('There is an invoice paid!');
        });
    }
}
