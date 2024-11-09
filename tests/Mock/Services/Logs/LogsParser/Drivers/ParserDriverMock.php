<?php

declare(strict_types=1);

namespace Tests\Mock\Services\Logs\LogsParser\Drivers;

use App\Repositories\Game\Log\Parser\Drivers\ParserDriverInterface;

readonly class ParserDriverMock implements ParserDriverInterface
{
    public function __construct(
        public string $template = '',
        public array $formatters = []
    ) {}

    public function template(): string
    {
        return $this->template;
    }

    public function formatters(): array
    {
        return $this->formatters;
    }
}
