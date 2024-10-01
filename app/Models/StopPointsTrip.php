<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $trip_id
 * @property int $start_station_id
 * @property int $end_station_id
 * @property int $available_seats
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Station $endStation
 * @property-read string|null $end_station_name
 * @property-read string|null $start_station_name
 * @property-read \App\Models\Station $startStation
 * @property-read \App\Models\Trip $trip
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip query()
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip whereAvailableSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip whereEndStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip whereStartStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip whereTripId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StopPointsTrip whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    /**
     * Get the name of the start station by its ID.
     *
     * @return string|null
     */
    public function getStartStationNameAttribute()
    {
        return $this->startStation ? $this->startStation->name : null;
    }

    /**
     * Get the name of the end station by its ID.
     *
     * @return string|null
     */
    public function getEndStationNameAttribute()
    {
        return $this->endStation ? $this->endStation->name : null;
    }
}
