<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'login' => 'required',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'Поле логин обязательно для заполнения',
            'password.required' => 'Поле пароль обязательно для заполнения',
        ];
    }
}
