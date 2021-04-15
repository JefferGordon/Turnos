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
            'txtnum' => 'required|unique:tbl_modulos,mod_numero',
            'txtdesc'=> 'required|unique:tbl_modulos,mod_descripcion'
        ];
    }
    public function messages()
    {
        return [
            'txtnum.required' => 'El campo Número no puede estar vacio',
            'txtdesc.required' => 'El campo Descripción no puede estar vacio' 
     
        ];
    }
}
