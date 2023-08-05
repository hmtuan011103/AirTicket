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
        $economySeats = request()->input('class_economy');
        $businessSeats = request()->input('class_business');
        if ($airplaneId) {
            $airplane = \App\Models\Plane::find($airplaneId);
            if ($airplane) {
                $totalSeats = $airplane->seat_total;
                $sumSeats = $economySeats + $businessSeats;
                if($sumSeats > $totalSeats || $economySeats === 0 || $businessSeats === 0) {
                    $fail('Please re-enter the plane seat number');
                }
            }
        } else {
            if(!$economySeats || !$businessSeats){
                $fail('Please choose plane');
            }
        }
    }
}
