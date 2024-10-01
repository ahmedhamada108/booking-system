<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $trip_id
 * @property int $seat_id
 * @property int $start_station_id
 * @property int $end_station_id
 * @property string $status
 * @property int $passenger_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Trip $trip
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereEndStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking wherePassengerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereSeatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereStartStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereTripId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUserId($value)
 * @mixin \Eloquent
 */
class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'trip_id',
        'seat_id',
        'start_station_id',
        'end_station_id',
        'status',
        'passenger_id'
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
