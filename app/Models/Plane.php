<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plane extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seat_total',
        'airline_id'
    ];

    public function airline(): BelongsTo
    {
        return $this->belongsTo(Airline::class);
    }

    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class);
    }



}
