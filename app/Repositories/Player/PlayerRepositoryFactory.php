<?php

declare(strict_types=1);

namespace App\Repositories\Player;

use App\Repositories\Abstract\RepositoryFactoryInterface;

class PlayerRepositoryFactory implements RepositoryFactoryInterface
{
    public function get(): PlayerRepositoryInterface
    {
        return new PlayerRepository;
    }
}
