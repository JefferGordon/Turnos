<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Valcreateusuario extends FormRequest
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

            'txtusuario' => 'required|unique:tbl_usuarios,usu_login',
            
            'txtclave' => 'required',
            'cbxrol' => 'required',
            'cbxpersona' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtusuario.required' => 'El campo usuario no puede estar vacio',
            'txtclave.required' => 'El campo clave no puede estar vacio',
            'cbxrol.required' => 'Seleccione un rol',
            'cbxpersona.required' => 'Seleccione una persona',
            
     
        ];
    }
}
