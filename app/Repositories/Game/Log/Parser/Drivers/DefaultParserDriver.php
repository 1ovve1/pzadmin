<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log\Parser\Drivers;

class DefaultParserDriver implements ParserDriverInterface
{
    public function template(): string
    {
        return '@whole_text@';
    }

    public function formatters(): array
    {
        return [];
    }
}
