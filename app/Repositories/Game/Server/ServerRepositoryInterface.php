<?php

declare(strict_types=1);

namespace App\Repositories\Game\Server;

use App\Data\Game\ServerData;
use App\Enums\Docker\ContainerStatusEnum;
use App\Enums\Models\Game\ServerEnum;
use App\Repositories\Abstract\RepositoryInterface;

interface ServerRepositoryInterface extends RepositoryInterface
{
    public function findServer(ServerEnum $serverEnum): ServerData;

    public function updateStatus(ServerEnum $serverEnum, ContainerStatusEnum $statusEnum): ServerData;
}
