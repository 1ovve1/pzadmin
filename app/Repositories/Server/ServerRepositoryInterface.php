<?php

declare(strict_types=1);

namespace App\Repositories\Server;

use App\Data\ServerData;
use App\Enums\Docker\ContainerStatusEnum;
use App\Enums\ServerEnum;
use App\Repositories\Abstract\RepositoryInterface;

interface ServerRepositoryInterface extends RepositoryInterface
{
    public function findServer(ServerEnum $serverEnum): ServerData;

    public function updateStatus(ServerEnum $serverEnum, ContainerStatusEnum $statusEnum): ServerData;
}
