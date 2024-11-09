<?php

namespace App\Data\Game;

use App\Repositories\Game\LogInstance\LogInstanceEnum;
use Spatie\LaravelData\Data;

class LogInstanceData extends Data
{
    public function __construct(
        readonly public ?int $id,
        readonly public LogInstanceEnum $name,
        readonly public string $checksum,
    ) {}
}
