<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Data\Auth\LoginData;
use App\Data\Auth\TokenData;
use App\Data\Auth\UserData;
use App\Exceptions\Auth\TokenNotFoundException;
use App\Exceptions\Auth\UserNotFoundException;
use App\Models\Auth\User;
use App\Repositories\Auth\Token\TokenRepositoryInterface;
use App\Repositories\Auth\User\UserRepositoryInterface;
use App\Services\Abstract\AbstractService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthService extends AbstractService implements AuthServiceInterface
{
    public function __construct(
        readonly protected UserRepositoryInterface $userRepository,
        readonly protected TokenRepositoryInterface $tokenRepository,
    ) {}

    public function authenticated(): UserData
    {
        return $this->userRepository->authenticated();
    }

    public function authenticate(LoginData $loginData): TokenData
    {
        try {
            $userData = $this->userRepository->findByLoginData($loginData);
        } catch (UserNotFoundException) {
            throw new AuthenticationException;
        }

        return $this->tokenRepository->createFor($userData);
    }

    /**
     * @throws TokenNotFoundException
     * @throws AuthenticationException
     */
    public function regenerate(): TokenData
    {
        $userData = $this->userRepository->authenticated();
        $tokenId = $this->getTokenIdFromRequest();

        return $this->tokenRepository->update($userData, $tokenId);
    }

    public function logout(): void
    {
        $tokenId = $this->getTokenIdFromRequest();

        $this->tokenRepository->delete($tokenId);
    }

    public function register(string $username, string $email, string $password): Authenticatable
    {
        return User::first(

        );
    }

    private function getTokenIdFromRequest(): int
    {
        $request = request();
        $token = $request->header('Authorization');

        return (int) explode('|', str_replace('Bearer ', '', $token))[0];
    }
}
