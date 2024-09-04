<?php

declare(strict_types=1);

namespace App\Services\Auth\User;

use App\Services\Abstract\ServiceFactoryInterface;
use Illuminate\Support\Facades\App;


class UserServiceFactory implements ServiceFactoryInterface
{
    function get(): UserServiceInterface
    {
        return App::make(UserService::class);
    }
}
