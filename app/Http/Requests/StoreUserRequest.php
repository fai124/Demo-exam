<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'login' => 'required|min:6|unique:users,login',
            'password' => 'required|min:8',
            'FIO' => 'required',
            'number' => 'required|integer|max:11',
            'email' => 'required|email|unique:users,email',
        ];
    }
}
