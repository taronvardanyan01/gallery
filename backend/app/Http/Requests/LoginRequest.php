<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    const USERNAME = 'email';
    const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::USERNAME => [
                'required',
                'email'
            ],
            self::PASSWORD => [
                'required',
                'string'
            ]
        ];
    }

    public function getEmail(): string
    {
        return $this->get(self::USERNAME);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
