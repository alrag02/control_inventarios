<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
        //To identify if request is for add or edit just take autoincremented id parameter form request.

        $id = request('id') ?: 'NULL';

        switch ($this->method()){
            case 'POST':
                return [
                    'name' => 'required|string|max:100',
                    'last_name_p' => 'required|string|max:100',
                    'last_name_m' => 'required|string|max:100',
                    'work_id' => 'required|string|unique:users|max:100',
                    'email' => 'nullable|email|max:255',
                    'password' => 'required|string|max:255|min:8|confirmed',
                ];
            case 'PUT':
                return [
                    'name' => 'required|string|max:100'.$id,
                    'last_name_p' => 'required|string|max:100',
                    'last_name_m' => 'required|string|max:100',
                    'email' => 'nullable|email|max:255',
                ];
            default:
                return [];
        }
    }
}
