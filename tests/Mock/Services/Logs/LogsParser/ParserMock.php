<?php

declare(strict_types=1);

namespace Tests\Mock\Services\Logs\LogsParser;

use App\Repositories\Game\Log\Parser\Parser;

readonly class ParserMock extends Parser
{
    public function tryVariablesScanner(string $template, string $line): array
    {
        return parent::variablesScanner($template, $line);
    }
}
