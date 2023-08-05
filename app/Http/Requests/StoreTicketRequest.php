<?php

namespace App\Http\Requests;

use App\Models\Flight;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTicketRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'flight_id' => 'required|exists:flights,id',
            'class' => [
                'required',
                Rule::in(['1', '2']),
            ],
            'quantity' => [
                'nullable',
                'required_with:class',
                'integer',
                'min:0',
                function ($attribute, $value, $fail) {
                    $selectedPlane = Flight::find($this->input('flight_id'));
                    if ($selectedPlane) {
                        if ($this->input('class') === '1' && $value > $selectedPlane->class_business) {
                            $fail('The number of business tickets cannot exceed the number of business seats on the plane');
                        } else if ($this->input('class') === '2' && $value > $selectedPlane->class_economy) {
                            $fail('The number of economy tickets cannot exceed the number of economy seats on the plane');
                        }
                    }
                },
            ],
            'price' => 'required|min:0',

        ];
    }
}
