<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Data\Auth\LoginData;
use App\Data\Auth\TokenData;
use App\Data\Auth\UserData;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;

interface AuthServiceInterface
{
    /**
     * @throws AuthenticationException
     */
    public function authenticated(): UserData;

    /**
     * @throws AuthenticationException
     */
    public function authenticate(LoginData $loginData): TokenData;

    public function regenerate(): TokenData;

    public function register(string $username, string $email, string $password): Authenticatable;

    /**
     * @throws AuthenticationException
     */
    public function logout(): void;
}
