<?php

declare(strict_types=1);

namespace App\Services\Abstract;

use ReflectionClass;
use RuntimeException;

abstract class AbstractService
{
    private function getStaticInterface(): string
    {
        $reflection = new ReflectionClass(static::class);

        foreach ($reflection->getInterfaceNames() as $interface) {
            if (str_contains($interface, 'ServiceInterface')) {
                return $interface;
            }
        }

        throw new RuntimeException('cannot find interface instance for service '.static::class);
    }
}
