<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bus_id' => $this->bus_id,
            'start_time' => $this->start_time,
            'arrival_time' => $this->arrival_time,
            'start_station_id' => $this->start_station_id,
            'start_station' => $this->startStation ? $this->startStation->name : null,
            'end_station_id' => $this->end_station_id,
            'end_station' => $this->endStation ? $this->endStation->name : null,
            'stop_points' => $this->stopPoints->map(function ($stop) {
                return [
                    'id' => $stop->id,
                    'available_seats' => $stop->available_seats,
                    'start_station_name' => $stop->startStation ? $stop->startStation->name : null,
                    'end_station_name' => $stop->endStation ? $stop->endStation->name : null,
                ];
            }),
        ];
    }
}
