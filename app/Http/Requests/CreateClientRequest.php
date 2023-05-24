<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'phone_number' => 'required',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'name.min:3' => 'Имя не может быть меньше 3 символов',
            'phone_number.required' => 'Номер телефона обязательно для',
        ];
    }
}
