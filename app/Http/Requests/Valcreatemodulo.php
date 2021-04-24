<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Valcreatemodulo extends FormRequest
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
            //
            'indentificador' => 'required|unique:tbl_modulos,mod_numero',
            'descripcion'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'indentificador.required' => 'El campo Identificador debe ser unico',
            'indentificador.unique' => 'El campo Identificador debe ser unico',
            'descripcion.required' => 'El campo Descripción no puede estar vacio' 
     
        ];
    }
}
