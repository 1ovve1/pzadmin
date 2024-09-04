<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Attributes\Hidden;
use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public string $id,
        public string $username,
        public string $email,
        #[Hidden]
        public string $password,
        public \DateTimeInterface $created_at,
        #[Hidden]
        public \DateTimeInterface $updated_at,
    ) {}

//    public function checkPassword()
}
