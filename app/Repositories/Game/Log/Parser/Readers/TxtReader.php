<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log\Parser\Readers;

use Generator;

readonly class TxtReader implements ReaderInterface
{
    public function __construct(
        public string $txtFilePath
    ) {}

    public function generator(): Generator
    {
        $handle = fopen($this->txtFilePath, 'r');

        if ($handle !== false) {
            while (($line = fgets($handle)) !== false) {
                yield $line;
            }

            fclose($handle);
        }
    }
}
