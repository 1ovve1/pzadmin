<?php

namespace App\Exceptions\Repositories\Game\Log;

use App\Data\Game\LogData;
use Exception;

class LogDataNotFoundException extends Exception
{
    public function __construct(LogData $logData)
    {
        parent::__construct('Log was not founded');
    }
}
