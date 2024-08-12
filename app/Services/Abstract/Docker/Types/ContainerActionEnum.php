<?php

declare(strict_types=1);

namespace App\Services\Abstract\Docker\Types;

enum ContainerActionEnum
{
    case UP;
    case DOWN;
    case RESTART;
}
