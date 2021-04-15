<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Valcreategenero extends FormRequest
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
            'txtgenero' => 'required|unique:tbl_generos,gen_descripcion',
            
        ];
    }
    public function messages()
    {
        return [
            'txtgenero.required' => 'El campo Descripción no puede estar vacio'
            
     
        ];
    }
}
