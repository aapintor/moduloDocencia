<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitulacionRequest extends FormRequest
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
            'alumno' => 'required',
            'asesor' => 'required',
            'sinodal1' => 'required',
            'sinodal2' => 'required',
            'sinodal3' => 'required',
            'opc_titu' => 'required'
        ];
    }
}
