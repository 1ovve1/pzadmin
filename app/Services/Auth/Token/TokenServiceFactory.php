<?php

declare(strict_types=1);

namespace App\Services\Auth\Token;

use App\Services\Abstract\ServiceFactoryInterface;
use Illuminate\Support\Facades\App;


class TokenServiceFactory implements ServiceFactoryInterface
{
    function get(): TokenServiceInterface
    {
        return App::make(TokenService::class);
    }
}
