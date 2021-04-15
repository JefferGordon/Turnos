<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Valupdatemodulo extends FormRequest
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
            'txtnum' => 'required',
            'txtdes'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'txtnum.required' => 'El campo Número no puede estar vacio',
            'txtdes.required' => 'El campo Descripción no puede estar vacio' 
     
        ];
    }
}
