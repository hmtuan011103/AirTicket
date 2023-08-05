<?php

namespace App\Http\Requests;

use App\Models\Plane;
use App\Rules\FlightClass;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFlightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'plane_id' => 'required',
            'class_business' =>  [
                'required_with:plane_id',
                'integer', 'min:0', new FlightClass
            ],
            'class_economy' => [
                'required_with:plane_id',
                'integer', 'min:0', new FlightClass
            ],
            'break_time' => 'required_with:intermediate_airport|integer|min:0|nullable',
            'intermediate_airport' => 'required_with:break_time|nullable',
            'flight_date' => 'required|after:today',
            'flight_route_id' => 'required',
            'flight_time_start_hour' => 'required',
            'flight_time_total_hour' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'plane_id.required' => 'The plane field is required.',
            'flight_route_id.required' => 'The flight route field is required.'
        ];
    }
}
