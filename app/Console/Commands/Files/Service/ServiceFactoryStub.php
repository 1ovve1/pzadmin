<?php

declare(strict_types=1);

namespace App\Console\Commands\Files\Service;

use App\Console\Abstract\Commands\Files\Stub\StubInterface;

final readonly class ServiceFactoryStub implements StubInterface
{
    public function getStubPath(): string
    {
        return __DIR__.'/../stubs/services/service_factory.stub';
    }

    public function convertInClassName(string $argumentName): string
    {
        return "{$argumentName}ServiceFactory";
    }

    public function getPath(): string
    {
        return app_path('/Services');
    }

    public function getNamespace(): string
    {
        return 'App\\Services';
    }
}
