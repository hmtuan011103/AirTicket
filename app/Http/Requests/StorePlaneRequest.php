<?php

namespace App\Http\Requests;

use App\Models\Plane;
use Illuminate\Foundation\Http\FormRequest;

class StorePlaneRequest extends FormRequest
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
    public function rules(Plane $plane): array
    {
        $tableName = $plane->getTable();
        return [
            'name' => "bail|required|string|unique:$tableName,name",
            'seat_total' => "bail|required|numeric|min:30|max:220",
            'airline_id' => 'bail|required'
        ];
    }

    public function messages(): array
    {
        return [
            'airline_id.required' => 'The airline field is required.'
        ];
    }
}
