<?php

namespace App\Http\Controllers;

use App\Services\TripService;
use App\Http\Requests\TripRequest;
use App\Http\Resources\TripResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TripController extends Controller
{
    protected $service;

    public function __construct(TripService $service)
    {
        $this->service = $service;
    }

    public function index(): AnonymousResourceCollection
    {
        $trips = $this->service->getAllTrips();
        return TripResource::collection($trips);
    }
}
