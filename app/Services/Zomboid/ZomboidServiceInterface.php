<?php

declare(strict_types=1);

namespace App\Services\Zomboid;

/**
 * Service for zomboid server management
 */
interface ZomboidServiceInterface
{
    public function getsStatus(): string;

    public function doStart(): bool;

    public function doDown(): bool;

    public function doRestart(): bool;
}
