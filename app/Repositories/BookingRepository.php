<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Seats;
use App\Models\StopPointsTrip;

class BookingRepository
{
    public function checkExistingBooking($trip_id, $start_station_id, $end_station_id, $seat_id)
    {
        return Booking::where('trip_id', $trip_id)
            ->where('start_station_id', $start_station_id)
            ->where('end_station_id', $end_station_id)
            ->where('seat_id', $seat_id)
            ->first();
    }

    public function createBooking($data)
    {
        return Booking::create($data);
    }
}
