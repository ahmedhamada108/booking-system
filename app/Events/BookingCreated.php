<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookingCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tripId;
    public $startStationId;
    public $endStationId;
    public $seatIds;
    public $quantity;
    
    /**
     * Create a new event instance.
     */
    public function __construct($tripId, $startStationId, $endStationId, $seatIds, $quantity)
    {
        $this->tripId = $tripId;
        $this->startStationId = $startStationId;
        $this->endStationId = $endStationId;
        $this->seatIds = $seatIds;
        $this->quantity = $quantity;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
