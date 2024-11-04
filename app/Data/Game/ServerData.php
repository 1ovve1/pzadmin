<?php

namespace App\Data\Game;

use App\Enums\Docker\ContainerStatusEnum;
use App\Enums\ServerEnum;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Data;

final class ServerData extends Data
{
    public int $port;

    public string $ip;

    #[Computed]
    public string $fullName;

    public function __construct(
        public int $id,
        public string $prefix,
        public ServerEnum $name,
        public ContainerStatusEnum $status,
    ) {
        $this->port = (int) config('zomboid.port');
        $this->ip = config('zomboid.ip');
        $this->fullName = $this->prefix.'_'.$this->name->value;
    }
}
