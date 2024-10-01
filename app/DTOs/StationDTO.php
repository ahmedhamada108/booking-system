<?php

namespace App\DTOs;

class StationDTO
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
}