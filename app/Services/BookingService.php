<?php

namespace App\Services;

use App\DTOs\BookingDTO;
use App\Models\StopPointsTrip;
use App\Repositories\BookingRepository;
use App\Events\BookingCreated; 

class BookingService
{
    protected $repository;

    public function __construct(BookingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function bookSeats(BookingDTO $dto)
    {
        $startSortOrder = StopPointsTrip::where('trip_id', $dto->trip_id)
            ->where('start_station_id', $dto->start_station_id)
            ->value('sort_order');

        $endSortOrder = StopPointsTrip::where('trip_id', $dto->trip_id)
            ->where('end_station_id', $dto->end_station_id)
            ->value('sort_order');

        if ($startSortOrder === null || $endSortOrder === null) {
            return ['error' => 'Invalid start or end station.'];
        }

        foreach ($dto->seat_ids as $seat_id) {
            if ($this->repository->checkExistingBooking($dto->trip_id, $dto->start_station_id, $dto->end_station_id, $seat_id)) {
                return ['error' => "Seat number $seat_id is already booked for this segment."];
            }

            $this->repository->createBooking([
                'passenger_id' => auth('api')->id(), 
                'trip_id' => $dto->trip_id,
                'start_station_id' => $dto->start_station_id,
                'end_station_id' => $dto->end_station_id,
                'seat_id' => $seat_id,
                'status' => 'On_Bus'
            ]);
        }

        $this->repository->decrementAvailableSeats($dto->trip_id, $startSortOrder, $endSortOrder, $dto->quantity);

        $this->repository->updateSeatStatus($dto->seat_ids, 'unavailable');

        event(new BookingCreated(
            $dto->trip_id,
            $dto->start_station_id,
            $dto->end_station_id,
            $dto->seat_ids,
            $dto->quantity
        ));

        return ['success' => 'Seats booked successfully!'];
    }
}
