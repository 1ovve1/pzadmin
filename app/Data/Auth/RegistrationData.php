<?php

namespace App\Data\Auth;

use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Data;

class RegistrationData extends Data
{
    #[Computed]
    public readonly string $name;

    #[Computed]
    public readonly string $username;

    #[Computed]
    public readonly string $email;

    public function __construct(
        string $email,
        string $username,
        #[\SensitiveParameter]
        public readonly string $password,
        public readonly string $hash,
    ) {
        $this->email = Str::lower($email);
        $this->username = Str::lower($username);
        $this->name = $this->username;
    }
}
