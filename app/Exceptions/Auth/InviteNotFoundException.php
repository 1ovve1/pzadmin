<?php

namespace App\Exceptions\Auth;

use Exception;
use JetBrains\PhpStorm\Pure;

class InviteNotFoundException extends Exception
{
    public function __construct(string $hash)
    {
        parent::__construct("Cannot find invite with the given hash ({$hash})");
    }
}
