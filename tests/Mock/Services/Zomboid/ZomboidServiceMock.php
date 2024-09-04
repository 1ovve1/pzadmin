<?php

declare(strict_types=1);

namespace Tests\Mock\Services\Zomboid;

use App\Data\ServerData;
use App\Enums\Docker\ContainerActionEnum;
use App\Enums\Docker\ContainerStatusEnum;
use App\Enums\ServerEnum;
use App\Repositories\Server\ServerRepositoryInterface;
use App\Services\Zomboid\ZomboidServiceInterface;
use Illuminate\Support\Facades\App;

class ZomboidServiceMock implements ZomboidServiceInterface
{
    private ServerRepositoryInterface $serverRepository;
    private ContainerStatusEnum $defaultStatus;
    private ContainerStatusEnum $realStatus;

    public function __construct(ContainerStatusEnum $defaultStatus, ?ContainerStatusEnum $realStatus = null)
    {
        $this->serverRepository = App::make(ServerRepositoryInterface::class);
        $this->defaultStatus  = $defaultStatus;
        $this->realStatus = $realStatus ?? $this->defaultStatus;
    }

    public function getServer(): ServerData
    {
        return $this->serverRepository->findServer(ServerEnum::ZOMBOID);
    }

    public function updateStatus(?callable $onChange = null): void
    {
        $serverData = $this->getServer();

        if ($serverData->status !== $this->realStatus) {
            $onChange(
                $this->serverRepository->updateStatus($serverData->name, $this->realStatus)
            );
        }
    }
    public function doStart(): bool
    {
        $this->realStatus = ContainerStatusEnum::ACTIVE;

        return true;
    }

    public function doDown(): bool
    {
        $this->realStatus = ContainerStatusEnum::DOWN;

        return true;
    }

    public function doRestart(): bool
    {
        $this->realStatus = ContainerStatusEnum::RESTARTING;

        return true;
    }

}
