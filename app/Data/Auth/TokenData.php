<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Data;

class TokenData extends Data
{
    public string $type = "Bearer";

    public function __construct(
        public string $token,
    ) {}
}
