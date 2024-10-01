<?php

namespace App\Repositories;

use App\Models\Station;

class StationRepository
{
    public function getAllStations()
    {
        return Station::all();
    }

}
