<?php

declare(strict_types=1);

namespace App\Repositories\Auth\Token;

use App\Repositories\Abstract\RepositoryFactoryInterface;
use Illuminate\Support\Facades\App;

class TokenRepositoryFactory implements RepositoryFactoryInterface
{
    public function get(): TokenRepositoryInterface
    {
        return App::make(TokenRepository::class);
    }
}
