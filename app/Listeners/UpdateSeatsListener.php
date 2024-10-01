<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Models\Seats;
use App\Models\StopPointsTrip;

class UpdateSeatsListener
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\BookingCreated  $event
     * @return void
     */
    public function handle(BookingCreated $event)
    {
        $this->decrementAvailableSeats($event->tripId, $event->startStationId, $event->endStationId, $event->quantity);
        
        $this->updateSeatStatus($event->seatIds, 'unavailable');
    }

    public function decrementAvailableSeats($tripId, $startStationId, $endStationId, $quantity)
    {
        $startSortOrder = StopPointsTrip::where('trip_id', $tripId)
            ->where('start_station_id', $startStationId)
            ->value('sort_order');

        $endSortOrder = StopPointsTrip::where('trip_id', $tripId)
            ->where('end_station_id', $endStationId)
            ->value('sort_order');

        StopPointsTrip::where('trip_id', $tripId)
            ->where('sort_order', '>=', $startSortOrder)
            ->where('sort_order', '<=', $endSortOrder)
            ->decrement('available_seats', $quantity);
    }

    public function updateSeatStatus($seatIds, $status)
    {
        Seats::whereIn('id', $seatIds)->update(['status' => $status]);
    }
}
