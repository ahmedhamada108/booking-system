<?php

namespace App\Http\Controllers;

use App\Services\SeatService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SeatRequest;
use App\Http\Resources\SeatResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SeatController extends Controller
{
    protected $service;

    public function __construct(SeatService $service)
    {
        $this->service = $service;
    }

    public function index(SeatRequest $request): AnonymousResourceCollection
    {
        $availableSeats = $this->service->getAvailableSeats(
            $request->trip_id,
            $request->start_station_id,
            $request->end_station_id
        );

        if ($availableSeats === null) {
            return response()->json(['message' => 'No available seats for this trip segment.'], 404);
        }

        return SeatResource::collection($availableSeats);
    }
}
