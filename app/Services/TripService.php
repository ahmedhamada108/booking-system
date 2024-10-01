<?php

namespace App\Services;

use App\Repositories\TripRepository;

class TripService
{
    protected $repository;

    public function __construct(TripRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllTrips()
    {
        return $this->repository->getAllTrips();
    }
}
