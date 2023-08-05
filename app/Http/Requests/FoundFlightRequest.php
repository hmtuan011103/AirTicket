<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoundFlightRequest extends FormRequest
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
            'place_start' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value === request()->input('place_end')) {
                        $fail('Data cannot be duplicated');
                    }
                },
            ],
            'place_end' =>  [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value === request()->input('place_start')) {
                        $fail('Data cannot be duplicated');
                    }
                },
            ],
            'departing' => 'required|after:yesterday',
            'returning' => [
                'required_if:flight_type,2',
                'nullable',
                'after:departing',
            ],
        ];
    }

    public function messages()
    {
        return [
            'departing.after' => 'Do not select a date in the past',
            'returning.required_if' => 'The returning date is required'
        ];
    }
}
