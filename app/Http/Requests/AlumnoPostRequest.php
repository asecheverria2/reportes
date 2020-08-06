<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'nombre' => [
                'required',
            ],
            'cedula' => [
                'required',
            ],
            'direccion' => [
                'required',
            ],
            'telefono' => [
                'present',
            ],
            'fecha_nacimiento' => [
                'present',
            ],
            'edad' => [
                'present',
            ],
            'sexo' => [
                'present',
            ],
        ];
    }
}
