<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'room_id' => 'required',
            'date' => 'required|date|after_or_equal:today',
            'payment' => 'required',
        ];
    }
}
