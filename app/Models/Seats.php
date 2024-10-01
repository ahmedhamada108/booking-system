<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $bus_id
 * @property int $seat_number
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bus $bus
 * @method static \Illuminate\Database\Eloquent\Builder|Seats newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seats newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seats query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seats whereBusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seats whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seats whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seats whereSeatNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seats whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seats whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Seats extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_id',
        'seat_number',
        'status',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
