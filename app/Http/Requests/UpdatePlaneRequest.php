<?php

namespace App\Http\Requests;

use App\Models\Plane;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlaneRequest extends FormRequest
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
        $id = request()->segment('3');
        return [
            'name' => [
                'bail','required','string',
                Rule::unique($tableName)->ignore($id),
            ],
            'seat_total' => 'bail|required|numeric|min:30|max:220',
            'airline_id' => 'bail|required',
        ];
    }
}
