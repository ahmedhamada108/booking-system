<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'seat_number' => $this->seat_number,
        ];
    }
}
