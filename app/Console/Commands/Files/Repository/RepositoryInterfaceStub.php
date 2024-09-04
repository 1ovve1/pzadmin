<?php

declare(strict_types=1);

namespace App\Console\Commands\Files\Repository;

use App\Console\Abstract\Commands\Files\Stub\StubInterface;

final readonly class RepositoryInterfaceStub implements StubInterface
{
    public function getStubPath(): string
    {
        return __DIR__.'/../stubs/repositories/repository_interface.stub';
    }

    public function getPath(): string
    {
        return app_path('/Repositories');
    }

    public function getNamespace(): string
    {
        return 'App\\Repositories';
    }

    public function convertInClassName(string $argumentName): string
    {
        return "{$argumentName}RepositoryInterface";
    }
}
