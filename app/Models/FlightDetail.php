<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FlightDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'break_time',
        'flight_id',
        'intermediate_airport'
    ];

    public function flight(): BelongsTo {
        return $this->belongsTo(Flight::class);
    }
}
