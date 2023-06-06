<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/* The `class StateChange implements ShouldBroadcast` is defining an event class named `StateChange`
that implements the `ShouldBroadcast` interface. This means that the event should be broadcasted to
other clients using a broadcasting system. The `ShouldBroadcast` interface requires the
implementation of a `broadcastOn` method that returns the channels the event should be broadcasted
on, and an optional `broadcastAs` method that specifies the name of the event. The `StateChange`
class also uses the `Dispatchable`, `InteractsWithSockets`, and `SerializesModels` traits to provide
additional functionality for the event. */
class StateChange implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $state;
    public $user;
    public $project;
    
    /**
     * Create a new event instance.
     */
    public function __construct($user, $project , $state)
    {
        $this->user = $user;
        $this->state = $state;
        $this->project = $project;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('event_not'),
        ];
    }
    
    /**
     * Broadcast do evento de mudanca de estado
     */
    public function broadcastAs(){
        return 'my-event';
    }
}
