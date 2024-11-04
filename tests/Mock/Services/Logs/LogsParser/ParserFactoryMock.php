<?php

declare(strict_types=1);

namespace Tests\Mock\Services\Logs\LogsParser;

use App\Repositories\Game\Log\Parser\Drivers\ZomboidConsoleDriver;
use App\Repositories\Game\Log\Parser\Parser;
use App\Repositories\Game\Log\Parser\ParserFactoryInterface;
use Tests\Mock\Services\Logs\LogsParser\Readers\ReaderMock;

final class ParserFactoryMock implements ParserFactoryInterface
{
    public function getTxtParser(string $filePath): Parser
    {
        return new ParserMock(new ZomboidConsoleDriver, new ReaderMock([
            'LOG  : Network     , 1726140073747> 90,205,928> No UPnP-enabled Internet gateway found, you must configure port forwarding on your gateway manually in order to make your server accessible from the Internet.',
            'LOG  : Network     , 1726140073747> 90,205,928> Initialising Server Systems...',
        ]));
    }
}
