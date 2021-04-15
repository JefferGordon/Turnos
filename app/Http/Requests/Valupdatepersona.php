<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Valupdatepersona extends FormRequest
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
        'txtnom' => 'required',
        'txtape' => 'required',
        'txtced' => 'ecuador:ci',
        'txtmail' => 'required|'
    ];
    }

    public function messages()
    {
        return [
            'txtnom.required' => 'El campo nombre no puede estar vacio',
            'txtape.required'  => 'El campo apellido no puede estar vacio',
            'txtced.ecuador:ci|required'  => 'Verifique el campo cedula',
            'txtmail.required'  => 'El campo Email no puede estar vacio'
        ];
    }
}
