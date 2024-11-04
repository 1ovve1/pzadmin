<?php

namespace App\Data\Game;

use Spatie\LaravelData\Attributes\Hidden;
use Spatie\LaravelData\Data;

class LogData extends Data
{
    public function __construct(
        #[Hidden]
        public readonly ?int $id,
        #[Hidden]
        public readonly ?LogInstanceData $logInstance,
        public readonly string $type = '',
        public readonly string $scope = '',
        public readonly string $message = '',
    ) {}
}
