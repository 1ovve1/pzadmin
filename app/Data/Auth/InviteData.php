<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Data;

class InviteData extends Data
{
    public function __construct(
        readonly string $id,
        readonly string $hash,
        readonly int $limit,
    ) {}
}
