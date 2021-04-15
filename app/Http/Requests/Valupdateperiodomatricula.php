<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Valupdateperiodomatricula extends FormRequest
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
            
            'txtfechini' => 'required',
            'txtfechfin' => 'required',
        ];
    }
    public function messages()
    {
        return [
           
            'txtfechini.required' => 'El campo Fecha Inicio no puede estar vacio',
            'txtfechfin.required' => 'El campo Fecha Fin no puede estar vacio'

        ];
    }
}
