<?php

namespace App\Http\Controllers;

use App\DTOs\LoginDTO;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResponseResource;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): JsonResponse|string
    {
        $loginDTO = new LoginDTO($request->email, $request->password);
        return $this->authService->login($loginDTO);
    }
}
