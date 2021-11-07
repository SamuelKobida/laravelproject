<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CreateRuleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:191',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole Názov je povinný údaj',
            'name.max' => 'Pole Názov má maximálnu dĺžku 191 znakov'
        ];
    }
}
