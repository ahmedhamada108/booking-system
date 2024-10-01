<?php

namespace App\DTOs;

class BookingDTO
{
    public function __construct(
        public int $trip_id,
        public int $start_station_id,
        public int $end_station_id,
        public array $seat_ids,
        public int $quantity
    ) {}

}
