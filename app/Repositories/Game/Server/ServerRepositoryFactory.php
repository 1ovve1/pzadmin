<?php

declare(strict_types=1);

namespace App\Repositories\Game\Server;

use App\Repositories\Abstract\RepositoryFactoryInterface;
use Illuminate\Support\Facades\App;

final class ServerRepositoryFactory implements RepositoryFactoryInterface
{
    public function get(): ServerRepositoryInterface
    {
        return App::make(ServerRepository::class);
    }
}
