<?php

declare(strict_types=1);

namespace App\Services\Abstract\Docker;

use App\Services\Abstract\Docker\Types\ContainerActionEnum;
use App\Services\Abstract\Docker\Types\ContainerStatusEnum;
use App\Throwable\Exceptions\ContainerOperationException;

/**
 * Describe all main operations with a docker container
 */
interface ContainerInterface
{
    /**
     * Get status
     *
     * @return ContainerStatusEnum
     */
    public function status(): ContainerStatusEnum;

    /**
     * Do some actions like up, down or restart container
     *
     * @param ContainerActionEnum $action
     * @return ContainerResponseInterface
     * @throws ContainerOperationException
     */
    public function operate(ContainerActionEnum $action): ContainerResponseInterface;
}
