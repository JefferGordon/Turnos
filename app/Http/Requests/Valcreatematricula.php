<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Valcreatematricula extends FormRequest
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
            'txtdes' => 'required|unique:tbl_matriculas,mat_descripcion',
            'txtpref' => 'required|unique:tbl_matriculas,mat_letra'
        ];
    }
    public function messages()
    {
        return [
            'txtdes.required' => 'El campo Descripción no puede estar vacio',
            'txtpref.required' => 'El campo Prefijo no puede estar vacio'       
     
        ];
    }
}
