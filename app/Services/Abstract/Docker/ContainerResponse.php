<?php

declare(strict_types=1);

namespace App\Services\Abstract\Docker;

readonly class ContainerResponse implements ContainerResponseInterface
{
    public function __construct(
        private bool $result
    ) {
    }

    public function isOk(): bool
    {
        return $this->result === true;
    }

    public function isBad(): bool
    {
        return $this->result === false;
    }
}
