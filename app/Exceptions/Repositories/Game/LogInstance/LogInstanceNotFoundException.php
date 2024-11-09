<?php

namespace App\Exceptions\Repositories\Game\LogInstance;

use App\Data\Game\LogInstanceData;
use App\Repositories\Game\LogInstance\LogInstanceEnum;
use Exception;

class LogInstanceNotFoundException extends Exception
{
    public function __construct(LogInstanceData|LogInstanceEnum $logInstanceEnum)
    {
        if ($logInstanceEnum instanceof LogInstanceData) {
            $logInstanceEnum = $logInstanceEnum->name;
        }

        parent::__construct("Log instance not founded for \"{$logInstanceEnum->path()}\"");
    }
}
