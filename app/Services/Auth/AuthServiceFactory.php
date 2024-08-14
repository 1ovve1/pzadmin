<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Services\Abstract\ServiceFactoryInterface;

class AuthServiceFactory implements ServiceFactoryInterface
{
    public function get(): AuthServiceInterface
    {
        return new AuthService;
    }
}
