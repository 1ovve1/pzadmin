<?php

declare(strict_types=1);

namespace App\Enums\Docker;

enum ContainerActionEnum
{
    case UP;
    case DOWN;
    case RESTART;
}
