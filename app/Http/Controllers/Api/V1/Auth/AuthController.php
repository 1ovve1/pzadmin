<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Data\Auth\LoginData;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegistrationRequest;
use App\Http\Resources\V1\Auth\AuthenticatedResource;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(
        readonly private AuthServiceInterface $authService
    ) {}

    /**
     * @throws AuthenticationException
     */
    public function index(): Response
    {
        $userData = $this->authService->authenticated();

        return $this->json($userData);
    }

    /**
     * @throws AuthenticationException
     */
    public function login(LoginRequest $loginRequest): Response
    {
        $loginData = LoginData::from($loginRequest);

        $tokenData = $this->authService->authenticate($loginData);

        return $this->json($tokenData, Response::HTTP_ACCEPTED);
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
