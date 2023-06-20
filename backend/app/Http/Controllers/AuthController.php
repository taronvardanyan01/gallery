<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Dto\LoginDto;
use LoginAction;

class AuthController extends Controller
{
    public function login(
        LoginRequest $request,
        LoginAction $loginAction
    ): JsonResponse
    {
        $dto = LoginDto::fromRequest($request);

        $result = $loginAction->run($dto);

        return response()->json(['data' => $result]);
    }

}
