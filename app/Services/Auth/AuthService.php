<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Data\Auth\LoginData;
use App\Data\Auth\TokenData;
use App\Data\Auth\UserData;
use App\Models\Auth\User;
use App\Repositories\Auth\Token\TokenRepository;
use App\Repositories\Auth\User\UserRepositoryInterface;
use App\Services\Abstract\AbstractService;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthService extends AbstractService implements AuthServiceInterface
{
    public function __construct(
        readonly protected UserRepositoryInterface $userRepository,
        readonly protected TokenRepository $tokenRepository,
    ) {}

    public function authenticated(): UserData
    {
        return $this->userRepository->authenticated();
    }

    public function authenticate(LoginData $loginData): TokenData
    {
        $userData = $this->userRepository->findByLoginData($loginData);

        return $this->tokenRepository->createFor($userData);
    }

    public function register(string $username, string $email, string $password): Authenticatable
    {
        return User::first();
    }
}
