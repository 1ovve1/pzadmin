<?php

namespace App\Exceptions\Repositories\Game\LogInstance;

use App\Data\Game\LogInstanceData;
use App\Exceptions\CheckedException;
use App\Repositories\Game\LogInstance\LogInstanceEnum;

class LogInstanceNotFoundException extends CheckedException
{
    protected string $messageFormat = 'Log instance not founded for "%s"';

    public function __construct(LogInstanceData|LogInstanceEnum $logInstanceEnum)
    {
        if ($logInstanceEnum instanceof LogInstanceData) {
            $logInstanceEnum = $logInstanceEnum->name;
        }

        parent::__construct($this->formatMessage($logInstanceEnum->path()));
    }
}
