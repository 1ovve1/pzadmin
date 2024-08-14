<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegistrationRequest;
use App\Http\Resources\V1\Auth\AuthenticatedResource;
use App\Http\Resources\V1\Auth\UserResource;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthController extends Controller
{
    public function __construct(
        readonly private AuthServiceInterface $authService
    ) {}

    /**
     * @throws AuthenticationException
     */
    public function index(): JsonResource
    {
        $user = $this->authService->authenticated();

        return UserResource::make($user);
    }

    /**
     * @throws AuthenticationException
     */
    public function login(LoginRequest $loginRequest): JsonResource
    {
        $payload = $loginRequest->validated();

        $personalAccessToken = $this->authService->authenticate($payload['username'], $payload['password'], $payload['remember'] ?? false);

        return AuthenticatedResource::make($personalAccessToken);
    }

    /**
     * @throws AuthenticationException
     */
    public function registration(RegistrationRequest $loginRequest): JsonResource
    {
        $payload = $loginRequest->validated();

        $this->authService->register($payload['username'], $payload['email'], $payload['password']);

        $personalAccessToken = $this->authService->authenticate($payload['username'], $payload['password']);

        return AuthenticatedResource::make($personalAccessToken);
    }
}
