<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class FlightClass implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $airplaneId = request()->input('plane_id');
        if ($airplaneId) {
            $airplane = \App\Models\Plane::find($airplaneId);
            if ($airplane) {
                $totalSeats = $airplane->seat_total;
                $economySeats = request()->input('class_economy', 0);
                $businessSeats = request()->input('class_business', 0);
                $sumSeats = $economySeats + $businessSeats;
                if($sumSeats > $totalSeats) {
                    $fail('The sum of economy seats and business seats cannot exceed the total number of seats on the airplane.');
                }
            }
        }
    }
}
