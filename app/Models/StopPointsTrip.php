<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StopPointsTrip extends Model
{
    use HasFactory;
    protected $fillable = [
        'trip_id',
        'start_station_id',
        'end_station_id',
        'available_seats',
    ];


    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function startStation()
    {
        return $this->belongsTo(Station::class, 'start_station_id');
    }

    public function endStation()
    {
        return $this->belongsTo(Station::class, 'end_station_id');
    }
}
