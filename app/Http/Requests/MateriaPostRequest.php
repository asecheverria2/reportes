<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriaPostRequest extends FormRequest
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
            'mat_nombre' => [
                'required',
            ],
            'mat_docente' => [
                'required',
            ],
            'mat_nrc' => [
                'required',
            ],
            'mat_horas' => [
                'required',
            ],
        ];
    }
}
