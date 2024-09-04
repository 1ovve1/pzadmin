<?php

declare(strict_types=1);

namespace App\Repositories\Server;

use App\Data\ServerData;
use App\Enums\Docker\ContainerStatusEnum;
use App\Enums\ServerEnum;
use App\Models\Server;
use App\Repositories\Abstract\AbstractRepository;

class ServerRepository extends AbstractRepository implements ServerRepositoryInterface
{
    public function findServer(ServerEnum $serverEnum): ServerData
    {
        $server = Server::server($serverEnum)->first();

        return ServerData::from(
            $server
        );
    }

    public function updateStatus(ServerEnum $serverEnum, ContainerStatusEnum $statusEnum): ServerData
    {
        $server = Server::server($serverEnum)->first();

        $server->fill(['status' => $statusEnum])->save();

        return ServerData::from($server);
    }
}
