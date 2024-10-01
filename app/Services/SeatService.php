<?php

namespace App\Services;

use App\Repositories\SeatRepository;

class SeatService
{
    protected $repository;

    public function __construct(SeatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAvailableSeats($trip_id, $start_station_id, $end_station_id)
    {
        return $this->repository->getAvailableSeats($trip_id, $start_station_id, $end_station_id);
    }
}
