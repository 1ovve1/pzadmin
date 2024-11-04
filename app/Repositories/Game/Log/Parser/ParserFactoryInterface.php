<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log\Parser;

interface ParserFactoryInterface
{
    public function getTxtParser(string $filePath): Parser;
}
