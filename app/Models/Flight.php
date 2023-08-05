<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;


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

    public function flightDetails(): HasMany {
        return $this->hasMany(FlightDetail::class);
    }
    public function tickets(): HasMany {
        return $this->hasMany(Ticket::class);
    }

    public function scopeFilter(Builder | QueryBuilder $query, array $filters): Builder | QueryBuilder
    {
        return $query->when($filters['departing'] ?? null, function ($query, $departing){
            $query->where('flight_date','=', $departing);
        })->when($filters['place_start'] ?? null, function ($query, $placeStart){
            $query->whereHas('flightRoute', function ($query) use ($placeStart) {
                $query->where('place_start', $placeStart);
            });
        })->when($filters['place_end'] ?? null, function ($query, $placeEnd){
            $query->whereHas('flightRoute', function ($query) use ($placeEnd) {
                $query->where('place_end', $placeEnd);
            });
        })->orWhere(function ($query) use ($filters) {
            if ($filters['returning'] !== null) {
                $query->when($filters['returning'] ?? null, function ($query, $returning) {
                    $query->where('flight_date', '=', $returning);
                })->when($filters['place_end'] ?? null, function ($query, $placeEnd) {
                    $query->whereHas('flightRoute', function ($query) use ($placeEnd) {
                        $query->where('place_start', $placeEnd);
                    });
                })->when($filters['place_start'] ?? null, function ($query, $placeStart) {
                    $query->whereHas('flightRoute', function ($query) use ($placeStart) {
                        $query->where('place_end', $placeStart);
                    });
                });
            }
        });
    }
}
