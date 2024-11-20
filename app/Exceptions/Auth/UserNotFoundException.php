<?php

namespace App\Exceptions\Auth;

use App\Exceptions\CheckedException;

class UserNotFoundException extends CheckedException
{
    protected string $messageFormat = "User with '%s' was not founded";

    public function __construct(string $usernameOrEmail)
    {
        parent::__construct($this->formatMessage($usernameOrEmail));
    }
}
