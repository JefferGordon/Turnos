<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Valupdateusuario extends FormRequest
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

            'txtlogin' => 'required',
            
            'txtpassword' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtusuario.required' => 'El campo usuario no puede estar vacio',
            'txtclave.required' => 'El campo clave no puede estar vacio',
            
     
        ];
    }
}
