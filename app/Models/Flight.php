<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_business',
        'class_economy',
        'flight_time_total',
        'flight_date',
        'flight_time_start',
        'flight_route_id',
        'plane_id',
    ];

    public function flightRoute():BelongsTo {
        return $this->belongsTo(FlightRoute::class);
    }

    public function plane():BelongsTo {
        return $this->belongsTo(Plane::class);
    }
}
