<?php

declare(strict_types=1);

namespace App\Console\Abstract\Commands\Files;

use App\Exceptions\Console\Commands\FileAlreadyExistsException;
use Illuminate\Filesystem\Filesystem;

readonly class FileBuffer
{
    public function __construct(
        public Filesystem $filesystem,
        public string $buffer,
    ) {}

    /**
     * @throws FileAlreadyExistsException
     */
    public function save(string $path): void
    {
        if ($this->filesystem->isFile($path)) {
            throw new FileAlreadyExistsException;
        }

        $this->filesystem->put($path, $this->buffer);
    }
}
