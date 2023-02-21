<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisasterStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'disaster_type_id' => 'required|numeric|exists:disaster_types,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'damage_level_id' => 'required|numeric|exists:damage_levels,id',
            'latitude' => 'required|numeric|min:-90|max:90',
            'longitude' => 'required|numeric|min:-180|max:180',
            'casualties' => 'required|numeric|min:0',
            'description'=> 'required|string|max:255',
            'date' => 'required|date|date_format:Y-m-d',
            'time' => 'required|date_format:H:i:s',
            'disaster_services' => 'array',
            'disaster_services.*.public_service_id' => 'required|numeric|exists:public_services,id',
            'disaster_services.*.damage_level_id' => 'required|numeric|exists:damage_levels,id',

        ];
    }
}
