<?php

declare(strict_types=1);

namespace App\Repositories\Auth\User;

use App\Data\Auth\LoginData;
use App\Data\Auth\UserData;
use App\Exceptions\Auth\UserNotFoundException;
use App\Models\Auth\User;
use App\Repositories\Abstract\AbstractRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function authenticated(): UserData
    {
        /** @var User $user */
        $user = Auth::user() ?? throw new AuthenticationException;

        return UserData::from($user);
    }

    public function findByLoginData(LoginData $loginData): UserData
    {
        /** @var User $user */
        $user = User::whereUsername($loginData->username)->first() ?? throw new UserNotFoundException;

        if (! Hash::check($loginData->password, $user->password)) {
            throw new UserNotFoundException;
        }

        return UserData::from($user);
    }
}
