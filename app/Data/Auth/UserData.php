<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public string $id,
        public string $username,
        public \DateTimeInterface $created_at,
        public \DateTimeInterface $updated_at,
    ) {}
}
