<?php

declare(strict_types=1);

namespace App\Console\Abstract\Commands\Files\Stub;

interface StubInterface
{
    public function getStubPath(): string;

    public function convertInClassName(string $argumentName): string;

    public function getPath(): string;

    public function getNamespace(): string;
}
