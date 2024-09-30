<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $bus_id
 * @property int $start_station_id
 * @property int $end_station_id
 * @property string $start_time
 * @property string|null $arrival_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \App\Models\Bus $bus
 * @property-read \App\Models\Station $endStation
 * @property-read \App\Models\Station $startStation
 * @method static \Illuminate\Database\Eloquent\Builder|Trip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trip query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereArrivalTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereBusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereEndStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereStartStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trip whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_id',
        'start_station_id',
        'end_station_id',
        'start_time',
        'arrival_time'
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function startStation()
    {
        return $this->belongsTo(Station::class, 'start_station_id');
    }

    public function endStation()
    {
        return $this->belongsTo(Station::class, 'end_station_id');
    }
    public function stopPoints()
    {
        return $this->hasMany(StopPointsTrip::class, 'trip_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
