<?php

declare(strict_types=1);

namespace App\Repositories\Auth\User;

use App\Data\Auth\LoginData;
use App\Data\Auth\UserData;
use App\Models\Auth\User;
use App\Repositories\Abstract\AbstractRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function authenticated(): UserData
    {
        return UserData::from(Auth::user() ?? throw new AuthenticationException());
    }

    public function findByLoginData(LoginData $loginData): UserData
    {
        /** @var User $user */
        $user = User::whereUsername($loginData->username)->first();

        if (($user === null) || ! (Hash::check($loginData->password, $user->password))) {
            throw new AuthenticationException();
        }

        return UserData::from($user);
    }
}
