<?php

namespace App\Exceptions\Auth;

use App\Data\Auth\UserData;
use App\Exceptions\CheckedException;

class TokenNotFoundException extends CheckedException
{
    protected string $messageFormat = 'Token not found for given user ()';

    public function __construct(UserData $userData)
    {
        parent::__construct($this->formatMessage($userData->username));
    }
}
