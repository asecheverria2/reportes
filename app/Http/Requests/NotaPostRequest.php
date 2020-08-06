<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaPostRequest extends FormRequest
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
            'alumno_id' => [
                'present',
            ],
            'materia_id' => [
                'present',
            ],
            'nota1' => [
                'present',
            ],
            'nota2' => [
                'present',
            ],
            'nota3' => [
                'present',
            ],
            'observacion' => [
                'present',
            ],
        ];
    }
}
