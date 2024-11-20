<?php

namespace App\Exceptions\Auth;

use App\Exceptions\CheckedException;

class InviteNotFoundException extends CheckedException
{
    protected string $messageFormat = 'Cannot find invite with the given hash (%s)';

    public function __construct(string $hash)
    {
        parent::__construct($hash);
    }
}
