<?php

namespace App\Http\Requests\inmobiliario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class empleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'num_ref' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nivel' => 'nullable|string|max:100',
            'fk_departamento' => 'required|int',
            'vigencia' => 'required|int'
        ];
    }
}
