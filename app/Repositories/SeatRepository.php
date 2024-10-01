<?php

namespace App\Repositories;

use App\Models\StopPointsTrip;
use App\Models\Seat;
use App\Models\Seats;

class SeatRepository
{
    public function getAvailableSeats($trip_id, $start_station_id, $end_station_id)
    {
        $stopPoint = StopPointsTrip::with('trip')->where('trip_id', $trip_id)
            ->where('start_station_id', $start_station_id)
            ->where('end_station_id', $end_station_id)
            ->first();

        if (!$stopPoint || $stopPoint->available_seats < 1) {
            return null;
        }

        $bus_id = $stopPoint->trip->bus_id;

        return Seats::where('bus_id', $bus_id)->where('status', 'available')->get(['id','seat_number']);
    }
}
