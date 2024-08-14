<?php

declare(strict_types=1);

namespace App\Repositories\Server;

use App\Repositories\Abstract\RepositoryFactoryInterface;

final class ServerRepositoryFactory implements RepositoryFactoryInterface
{
    public function get(): ServerRepositoryInterface
    {
        return new ServerRepository;
    }
}
