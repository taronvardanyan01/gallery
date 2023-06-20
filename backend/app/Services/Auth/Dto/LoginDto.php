<?php

namespace Dto;

use App\Http\Requests\LoginRequest;

class LoginDto
{
    public function __construct(
        public string $email,
        public string $password
    ) {}

    public static function fromRequest(LoginRequest $request): LoginDto
    {
        return new self(
            email: $request->getEmail(),
            password: $request->getPassword()
        );
    }
}
