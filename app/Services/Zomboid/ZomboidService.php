<?php

declare(strict_types=1);

namespace App\Services\Zomboid;

use App\Services\Abstract\AbstractService;
use App\Services\Abstract\Docker\Types\ContainerActionEnum;
use App\Services\Zomboid\Docker\ZomboidDockerContainer;

class ZomboidService extends AbstractService implements ZomboidServiceInterface
{
    public function __construct(
        protected ZomboidDockerContainer $zomboidDockerContainer
    ) {
    }

    public function getsStatus(): string
    {
        $statusEnum = $this->zomboidDockerContainer->status();

        return $statusEnum->value;
    }

    public function doStart(): bool
    {
        $result = $this->zomboidDockerContainer->operate(ContainerActionEnum::UP);

        return $result->isOk();
    }

    public function doDown(): bool
    {
        $result = $this->zomboidDockerContainer->operate(ContainerActionEnum::DOWN);

        return $result->isOk();
    }

    public function doRestart(): bool
    {
        $result = $this->zomboidDockerContainer->operate(ContainerActionEnum::RESTART);

        return $result->isOk();
    }


}
