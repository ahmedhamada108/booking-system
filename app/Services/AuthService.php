<?php
namespace App\Services;

use App\Models\User;
use App\DTOs\LoginDTO;
use App\Traits\apiResponseTrait;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\LoginResponseResource;

class AuthService
{
    use apiResponseTrait;
    
    /**
     * Handle user login and generate JWT token.
     *
     * @param LoginDTO $loginDTO
     * @return string
     * @throws \Exception
     */
    public function login(LoginDTO $loginDTO): JsonResponse
    {
        try {
            if (!$user = $this->attemptLogin($loginDTO)) {
                return $this->errorResponse('Invalid credentials');
            } else {
                $token = JWTAuth::fromUser($user);
                return $this->successResponse('Login successfully', new LoginResponseResource(['token' => $token, 'user' => $user]));
            }
        } catch (\Exception $e) {
            return $this->errorResponse('An unexpected error occurred.');
        }
    }
    
    

    /**
     * Attempt to log the user in and return a JWT token.
     *
     * @param LoginDTO $loginDTO
     * @return string|null
     */
    private function attemptLogin(LoginDTO $loginDTO): ?User
    {
        $credentials = [
            'email' => $loginDTO->email,
            'password' => $loginDTO->password,
        ];

        if (auth('api')->attempt($credentials)) {
            return auth('api')->user();
        }

        return null; 
    }
}
