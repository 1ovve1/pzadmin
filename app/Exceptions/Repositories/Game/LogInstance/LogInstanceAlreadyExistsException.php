<?php

namespace App\Exceptions\Repositories\Game\LogInstance;

use App\Repositories\Game\LogInstance\LogInstanceEnum;
use Exception;

class LogInstanceAlreadyExistsException extends Exception
{
    public function __construct(LogInstanceEnum $logInstanceEnum)
    {
        parent::__construct("Log instance already exists by given credentials: { name: {$logInstanceEnum->name}, path: {$logInstanceEnum->path()} })");
    }
}
