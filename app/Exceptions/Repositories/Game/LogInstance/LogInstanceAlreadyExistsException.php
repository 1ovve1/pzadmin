<?php

namespace App\Exceptions\Repositories\Game\LogInstance;

use App\Exceptions\CheckedException;
use App\Repositories\Game\LogInstance\LogInstanceEnum;

class LogInstanceAlreadyExistsException extends CheckedException
{
    protected string $messageFormat = 'Log instance already exists by given credentials: { name: %s, path: %s })';

    public function __construct(LogInstanceEnum $logInstanceEnum)
    {
        parent::__construct($this->formatMessage($logInstanceEnum->name, $logInstanceEnum->path()));
    }
}
