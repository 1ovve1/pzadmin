<?php

namespace App\Exceptions\Auth;

use App\Exceptions\CheckedException;

class IncorrectPasswordException extends CheckedException
{
    protected string $messageFormat = "Invalid password exception for user '%s'";

    public function __construct(string $usernameOrEmail)
    {
        parent::__construct($this->formatMessage($usernameOrEmail));
    }
}
