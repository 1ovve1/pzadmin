<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Data;

class LoginData extends Data
{
    public function __construct(
        public string $username,
        #[\SensitiveParameter]
        public string $password,
        public bool $remember_me = false,
    ) {}
}
