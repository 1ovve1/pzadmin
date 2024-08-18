<?php

declare(strict_types=1);

namespace App\Repositories\Auth\User;

use App\Data\Auth\LoginData;
use App\Data\Auth\TokenData;
use App\Data\Auth\UserData;
use App\Exceptions\Auth\UserNotFoundException;
use App\Models\Auth\PersonalAccessToken;
use App\Repositories\Abstract\RepositoryInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\UnauthorizedException;

interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * @throws AuthenticationException
     */
    public function authenticated(): UserData;

    /**
     * @throws AuthenticationException
     */
    public function findByLoginData(LoginData $loginData): UserData;
}
