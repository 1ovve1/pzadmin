<?php

declare(strict_types=1);

namespace App\Console\Commands\Actions\Service;

use App\Console\Abstract\Commands\Action\AbstractCreateFileAction;
use App\Console\Abstract\Commands\Files\Stub\StubKeywordEnum;

readonly class CreateServiceFileAction extends AbstractCreateFileAction
{
    public function create(): string
    {
        $this->createDirectoryIfNotExists();

        $this->getStubBuilder()
            ->set(StubKeywordEnum::NAMESPACE, $this->namespace)
            ->set(StubKeywordEnum::CLASSNAME, $this->className)
            ->set(StubKeywordEnum::IMPLEMENT_CLASSNAME, "{$this->className}Interface")
            ->make()
            ->save($this->classPath);

        return $this->classPath;
    }
}
