<?php

namespace App\Http\Requests;

use App\Models\Airline;
use Illuminate\Foundation\Http\FormRequest;

class StoreAirlineRequest extends FormRequest
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
    public function rules(Airline $airline): array
    {
        $tableName = $airline->getTable();
        return [
            'file_upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => "required|string|max:50|unique:$tableName,name"
        ];
    }
}
