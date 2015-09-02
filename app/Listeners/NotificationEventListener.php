<?php

namespace avaluestay\Listeners;

use avaluestay\Contracts\NoticeInterface;
use avaluestay\Events\Notification;
use avaluestay\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationEventListener
{
    /**
     * @var \avaluestay\User
     */
    private $user;
    /**
     * @var \avaluestay\Listeners\NoticeInterface
     */
    private $notice;

    /**
     * Create the event listener.
     *
     * @param \avaluestay\User                      $user
     * @param \avaluestay\Contracts\NoticeInterface $notice
     */
    public function __construct(User $user, NoticeInterface $notice)
    {
        //
        $this->user = $user;
        $this->notice = $notice;
    }

    /**
     * Handle the event.
     *
     * @param  Notification  $event
     * @return void
     */
    public function handle(Notification $event)
    {
        $this->constructData($event);
    }

    private function constructData(Notification $event)
    {

        switch ( $event->class ){
            case 'property':
                $this->createPropertyEventData($event);
            case 'message':
                $this->createMessageEventData($event);
        }
    }

    private function createPropertyEventData($event)
    {
        $this->notice->class = $event->class;
        $this->notice->object = $event->object;
        $this->notice->eventObject_id = $event->object->id;
        $this->notice->status = 0;
        $this->notice->event = $event->event;
        $this->notice->notify_user_id = $this->user->whereType('manager')->first()->id;
        $this->notice->save();
    }

    private function createMessageEventData($event)
    {
        $this->notice->class = $event->class;
        $this->notice->object = $event->object;
        $this->notice->eventObject_id = $event->object->id;
        $this->notice->status = 0;
        $this->notice->event = $event->event;
        $this->notice->notify_user_id = $event->object->receiver_id;
        $this->notice->save();
    }
}
