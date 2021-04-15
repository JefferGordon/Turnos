<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class Valcreatepersona extends FormRequest
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
        'txtnombres' => 'required',
        'txtapellidos' => 'required',
        'txtcedula' => 'ecuador:ci|required|unique:tbl_personas,per_cedula',
        'txtcorreo' => 'required|email:tbl_personas,per_email',
        'cbxgenero' => 'required',
        'cbxmodulo' => 'required'];
    }

    public function messages()
    {
        return [
            'txtnombres.required' => 'El campo nombre no puede estar vacio',
            'txtapellidos.required'  => 'El campo apellido no puede estar vacio',
            'txtcedula.ecuador:ci|required'  => 'Verifique el campo cedula',
            
        ];
    }
}
