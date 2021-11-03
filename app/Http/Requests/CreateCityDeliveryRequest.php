<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCityDeliveryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'city_id' => 'required',
            'delivery_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'city_id.required' => 'Pole je povinný údaj',
            'delivery_id.required' => 'Pole je povinný údaj'
        ];
    }
}
