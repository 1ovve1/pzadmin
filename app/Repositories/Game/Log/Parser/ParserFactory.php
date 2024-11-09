<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log\Parser;

use App\Repositories\Game\Log\Parser\Drivers\ZomboidConsoleDriver;
use App\Repositories\Game\Log\Parser\Readers\TxtReader;

final class ParserFactory implements ParserFactoryInterface
{
    public function getTxtParser(string $filePath): Parser
    {
        return new Parser(new ZomboidConsoleDriver, new TxtReader($filePath));
    }
}
