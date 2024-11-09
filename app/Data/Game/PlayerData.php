<?php

namespace App\Data\Game;

use Spatie\LaravelData\Data;

class PlayerData extends Data
{
    public function __construct(
        readonly public int $id,
        readonly public string $name
    ) {}
}
