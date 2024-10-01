<?php

namespace App\DTOs;

class TripDTO
{
    public function __construct(
        public int $id,
        public int $bus_id,
        public string $start_time,
        public string $arrival_time,
        public string $start_station,
        public string $end_station,
        public array $stop_points
    ) {}
}
