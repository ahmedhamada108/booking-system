<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSeatRequest;
use App\Services\BookingService;
use App\DTOs\BookingDTO;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    protected $service;

    public function __construct(BookingService $service)
    {
        $this->service = $service;
    }

    public function bookSeats(BookSeatRequest $request): JsonResponse
    {
        $dto = new BookingDTO(
            $request->trip_id,
            $request->start_station_id,
            $request->end_station_id,
            $request->seat_id,
            $request->quantity
        );

        $result = $this->service->bookSeats($dto);

        if (isset($result['error'])) {
            return response()->json(['message' => $result['error']], 400);
        }

        return response()->json(['message' => $result['success']], 200);
    }
}
