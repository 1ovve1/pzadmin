<?php

namespace App\Data\Auth;

use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Data;

class LoginData extends Data
{
    #[Computed]
    readonly public string $username;

    public function __construct(
        string $username,
        #[\SensitiveParameter]
        readonly public string $password,
        readonly public bool $remember_me = false,
    ) {
        $this->username = Str::lower($username);
    }
}
