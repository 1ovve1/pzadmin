<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log\Parser\Readers;

use Generator;

interface ReaderInterface
{
    /**
     * Handle parse function with generator narrative
     */
    public function generator(): Generator;
}
