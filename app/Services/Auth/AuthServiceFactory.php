<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Services\Abstract\ServiceFactoryInterface;
use Illuminate\Support\Facades\App;

class AuthServiceFactory implements ServiceFactoryInterface
{
    public function get(): AuthServiceInterface
    {
        return App::make(AuthService::class);
    }
}
