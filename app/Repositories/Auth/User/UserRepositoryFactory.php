<?php

declare(strict_types=1);

namespace App\Repositories\Auth\User;

use App\Repositories\Abstract\RepositoryFactoryInterface;
use Illuminate\Support\Facades\App;

class UserRepositoryFactory implements RepositoryFactoryInterface
{
    function get(): UserRepositoryInterface
    {
        return App::make(UserRepository::class);
    }
}
