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

    public function decrementAvailableSeats($trip_id, $startSortOrder, $endSortOrder, $quantity)
    {
        StopPointsTrip::where('trip_id', $trip_id)
            ->where('sort_order', '>=', $startSortOrder)
            ->where('sort_order', '<=', $endSortOrder)
            ->decrement('available_seats', $quantity);
    }

    public function updateSeatStatus($seat_ids, $status)
    {
        Seats::whereIn('id', $seat_ids)->update(['status' => $status]);
    }
}
