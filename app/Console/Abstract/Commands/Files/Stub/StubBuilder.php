<?php

declare(strict_types=1);

namespace App\Console\Abstract\Commands\Files\Stub;

use App\Console\Abstract\Commands\Files\FileBuffer;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;

class StubBuilder
{
    /**
     * @var string string buffer of file stub
     */
    protected string $file;

    /** @var array<callable(string): string> */
    protected array $steps = [];

    protected Filesystem $filesystem;

    /**
     * @throws FileNotFoundException
     */
    public function __construct(
        Filesystem $filesystem,
        StubInterface $stub
    ) {
        $this->filesystem = $filesystem;
        $this->file = $this->filesystem->get($stub->getStubPath());
    }

    public function set(StubKeywordEnum $keywordEnum, string $value): self
    {
        return $this->setStep(
            fn (string $buffer) => $this->regReplace($keywordEnum, $value, $buffer)
        );
    }

    public function make(): FileBuffer
    {
        $buffer = $this->file;

        foreach (array_reverse($this->steps) as $step) {
            $buffer = $step($buffer);
        }

        return new FileBuffer($this->filesystem, $buffer);
    }

    private function regReplace(StubKeywordEnum $keywordEnum, string $replaced, string $buffer): string
    {
        return preg_replace($keywordEnum->getReg(), $replaced, $buffer);
    }

    private function setStep(callable $callable): self
    {
        $this->steps[] = $callable;

        return $this;
    }
}
