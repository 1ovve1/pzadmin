<?php

declare(strict_types=1);

namespace App\Console\Abstract\Commands\Action;

use App\Console\Abstract\Commands\Files\Stub\StubBuilder;
use App\Console\Abstract\Commands\Files\Stub\StubInterface;
use App\Console\Abstract\Commands\Files\Traits\ParseArgumentTrait;
use App\Exceptions\Console\Commands\FileAlreadyExistsException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;

abstract readonly class AbstractCreateFileAction
{
    use ParseArgumentTrait;

    private Filesystem $filesystem;

    /** @var string Argument end-name like Test2 in Test1/Test2 */
    public string $argumentName;

    /** @var string Class name from StubInterface::convertInClassName conversion */
    public string $className;

    /** @var string Full class namespace */
    public string $namespace;

    /** @var string Full folder path */
    public string $folderPath;

    /** @var string Full class path */
    public string $classPath;

    /**
     * @param  string  $argument  Raw argument like Test, Test1/Test2, Test1/Test2/Test3 etc.
     */
    public function __construct(
        public StubInterface $stub,
        public string $argument,
    ) {
        $this->filesystem = new Filesystem;

        $this->argumentName = $this->parseNameByArgument($argument);
        $this->className = $this->stub->convertInClassName($this->argumentName);
        $this->namespace = "{$this->stub->getNamespace()}\\{$this->parsePrefixNamespaceByArgument($argument)}\\{$this->argumentName}";
        $this->folderPath = "{$this->stub->getPath()}/{$this->parsePrefixPathByArgument($argument)}/{$this->argumentName}";
        $this->classPath = $this->folderPath."/{$this->className}.php";
    }

    /**
     * @return string file destination
     *
     * @throws FileNotFoundException
     * @throws FileAlreadyExistsException
     */
    abstract public function create(): string;

    /**
     * @throws FileNotFoundException
     */
    protected function getStubBuilder(): StubBuilder
    {
        return new StubBuilder($this->filesystem, $this->stub);
    }

    protected function createDirectoryIfNotExists(): void
    {
        if (! $this->filesystem->isDirectory($this->folderPath)) {
            $this->filesystem->makeDirectory($this->folderPath, recursive: true);
        }
    }
}
