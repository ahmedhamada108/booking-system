<?php

namespace App\Http\Controllers;

use App\Services\StationService;
use App\Http\Requests\StationRequest;
use App\Http\Resources\StationResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StationController extends Controller
{
    protected $stationService;

    public function __construct(StationService $stationService)
    {
        $this->stationService = $stationService;
    }

    public function index(): AnonymousResourceCollection
    {
        $stations = $this->stationService->getAllStations();

        return StationResource::collection($stations);
    }
}
