<?php

declare(strict_types=1);

namespace App\Console\Commands\Actions\Repository;

use App\Console\Abstract\Commands\Action\AbstractCreateFileAction;
use App\Console\Abstract\Commands\Files\Stub\StubKeywordEnum;

readonly class CreateRepositoryFactoryFileAction extends AbstractCreateFileAction
{
    public function create(): string
    {
        $this->createDirectoryIfNotExists();

        $this->getStubBuilder()
            ->set(StubKeywordEnum::NAMESPACE, $this->namespace)
            ->set(StubKeywordEnum::CLASSNAME, $this->className)
            ->set(StubKeywordEnum::RETURN_TYPE, "{$this->argumentName}RepositoryInterface")
            ->set(StubKeywordEnum::NEW_CLASSNAME, "{$this->argumentName}Repository")
            ->make()
            ->save($this->classPath);

        return $this->classPath;
    }
}
