<?php

namespace App\DTOs;

class SeatDTO
{
    public function __construct(
        public int $id,
        public int $bus_id
    ) {}
}
