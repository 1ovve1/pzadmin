<?php

declare(strict_types=1);

namespace Tests\Mock\Services\Logs\LogsParser\Readers;

use App\Repositories\Game\Log\Parser\Readers\ReaderInterface;
use Generator;

readonly class ReaderMock implements ReaderInterface
{
    public function __construct(
        public array $generatorSequence = []
    ) {}

    public function generator(): Generator
    {
        foreach ($this->generatorSequence as $generatorLine) {
            yield $generatorLine;
        }
    }
}
