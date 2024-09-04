<?php

declare(strict_types=1);

namespace App\Repositories\Player;

use App\Repositories\Abstract\RepositoryFactoryInterface;
use Illuminate\Support\Facades\App;

class PlayerRepositoryFactory implements RepositoryFactoryInterface
{
    public function get(): PlayerRepositoryInterface
    {
        return App::make(PlayerRepository::class);
    }
}
