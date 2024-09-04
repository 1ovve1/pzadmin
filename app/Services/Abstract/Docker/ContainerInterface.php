<?php

declare(strict_types=1);

namespace App\Services\Abstract\Docker;

use App\Enums\Docker\ContainerActionEnum;
use App\Enums\Docker\ContainerStatusEnum;
use App\Throwable\Exceptions\ContainerOperationException;

/**
 * Describe all main operations with a docker container
 */
interface ContainerInterface
{
    /**
     * Get status
     */
    public function status(): ContainerStatusEnum;

    /**
     * Do some actions like up, down or restart container
     *
     * @throws ContainerOperationException
     */
    public function operate(ContainerActionEnum $action): ContainerResponseInterface;
}
