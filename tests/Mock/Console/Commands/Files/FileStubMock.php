<?php

declare(strict_types=1);

namespace Tests\Mock\Console\Commands\Files;

use App\Console\Abstract\Commands\Files\Stub\StubInterface;

class FileStubMock implements StubInterface
{
    public function getStubPath(): string
    {
        return __DIR__.'/stub/mock.stub';
    }

    public function getPath(): string
    {
        return "/example_path";
    }

    public function getNamespace(): string
    {
        return "\\example_namespace";
    }

    public function convertInClassName(string $argumentName): string
    {
        return $argumentName;
    }
}
