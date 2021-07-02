<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'currentpassword' => 'required|min:8',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',

        ];
    }
}
