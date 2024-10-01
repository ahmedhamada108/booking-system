<?php

namespace App\Repositories;

use App\Models\Trip;


class TripRepository
{
    public function getAllTrips()
    {
        return Trip::with(['startStation', 'endStation', 'stopPoints.startStation', 'stopPoints.endStation'])->get();
    }

}
