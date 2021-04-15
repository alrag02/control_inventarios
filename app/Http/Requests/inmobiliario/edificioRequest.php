<?php

namespace App\Http\Requests\inmobiliario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class edificioRequest extends FormRequest
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
            'vigencia' => 'required|int'
        ];
    }
}
