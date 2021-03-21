<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SpotFormRequest extends FormRequest
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
            'foto' => 'required|mimes:jpg|max:8192',
            'descripción' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'foto.required' => 'Selecciona una foto para subir',
            'foto.mimes' => 'Selecciona una foto con formato jpg o jpeg',
            'foto.max' => 'La foto es demasiado pesada',
            'descripción.required' => 'Añade una descripción para la foto'
        ];
    }
}
