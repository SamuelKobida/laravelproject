<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CreateRuleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    ////// INACTIVE IN SPA USING VUE
    public function rules()
    {
        return [
            'name' => 'required|max:191',
            'priority' => 'required|integer',
            'value' => 'required|max:191',
            'carrier_service_id' => 'required',
            'eshop_id' => 'required',
            'predicate_id' => 'required',
            'subject_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole názov je povinný údaj',
            'name.max' => 'Pole názov má maximálnu dĺžku 191 znakov',
            'priority.integer' => 'Pole priority musí byť celé číslo',
            'priority.required' => 'Pole priority je povinný údaj',
            'value.required' => 'Pole value je povinný údaj',
            'value.max' => 'Pole value má maximálnu dĺžku 191 znakov',
            'carrier_service_id.required' => 'Pole carrier service je povinný údaj',
            'eshop_id.required' => 'Pole eshop je povinný údaj',
            'predicate_id.required' => 'Pole predicate je povinný údaj',
            'subject_id.required' => 'Pole subject je povinný údaj',
        ];
    }
}
