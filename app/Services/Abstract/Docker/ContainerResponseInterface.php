<?php

declare(strict_types=1);

namespace App\Services\Abstract\Docker;


/**
 * DTO for container operation result (like up, down, restart etc.)
 */
interface ContainerResponseInterface
{
    public function isOk(): bool;

    public function isBad(): bool;
}
