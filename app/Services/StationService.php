<?php

namespace App\Services;

use App\Repositories\StationRepository;

class StationService
{
    protected $stationRepository;

    public function __construct(StationRepository $stationRepository)
    {
        $this->stationRepository = $stationRepository;
    }

    public function getAllStations()
    {
        return $this->stationRepository->getAllStations();
    }

}
