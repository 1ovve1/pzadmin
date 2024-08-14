<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\Auth\PersonalAccessToken;
use App\Models\Auth\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;

interface AuthServiceInterface
{
    /**
     * @throws AuthenticationException
     */
    public function authenticated(): User;

    /**
     * @throws AuthenticationException
     */
    public function authenticate(string $username, string $password, bool $remember = false): PersonalAccessToken;

    public function register(string $username, string $email, string $password): Authenticatable;
}
