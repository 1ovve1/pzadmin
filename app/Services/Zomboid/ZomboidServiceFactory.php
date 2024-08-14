<?php

declare(strict_types=1);

namespace App\Services\Zomboid;

use App\Enums\ServerEnum;
use App\Repositories\Server\ServerRepositoryFactory;
use App\Services\Abstract\ServiceFactoryInterface;
use App\Services\Zomboid\Docker\ZomboidDockerContainer;
use Lowel\Docker\ClientFactory as DockerClientFactory;

class ZomboidServiceFactory implements ServiceFactoryInterface
{
    public function get(): ZomboidServiceInterface
    {
        $dockerClientFactory = new DockerClientFactory;
        $serverRepositoryFactory = new ServerRepositoryFactory;

        return new ZomboidService(
            new ZomboidDockerContainer($dockerClientFactory->getClientWithHandler(), ServerEnum::ZOMBOID->name()),
            $serverRepositoryFactory->get(),
        );
    }
}
