<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\Auth\PersonalAccessToken;
use App\Models\Auth\User;
use App\Services\Abstract\AbstractService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthService extends AbstractService implements AuthServiceInterface
{
    public function authenticated(): User
    {
        throw new AuthenticationException;
    }

    public function authenticate(string $username, string $password, bool $remember = false): PersonalAccessToken
    {
        throw new AuthenticationException;
    }

    public function register(string $username, string $email, string $password): Authenticatable
    {
        return User::first();
    }
}
