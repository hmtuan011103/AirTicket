<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'flight_id',
        'discount',
        'price',
        'type_discount',
        'class',
        'quantity',
    ];

    public function flight(): BelongsTo {
        return $this->belongsTo(Flight::class);
    }
}
