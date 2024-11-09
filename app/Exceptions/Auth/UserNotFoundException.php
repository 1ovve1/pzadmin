<?php

namespace App\Exceptions\Auth;

use Exception;
use JetBrains\PhpStorm\Pure;

class UserNotFoundException extends Exception
{
    #[Pure]
    public function __construct(string $username)
    {
        parent::__construct("User with '{$username}' was not founded");
    }
}
