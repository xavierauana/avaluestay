<?php

namespace avaluestay\Events;

use avaluestay\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Notification extends Event
{
    use SerializesModels;

    public $object;
    public $class;
    public $event;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($object, $event)
    {
        $reflection =  new \ReflectionClass($object);
        $this->class = $reflection->getShortName();
        $this->object = $object;
        $this->event = $event;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
