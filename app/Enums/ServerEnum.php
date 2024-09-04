<?php

declare(strict_types=1);

namespace App\Enums;

enum ServerEnum: string
{
    case ZOMBOID = 'zomboid';

    public function name(): string
    {
        return config('app.name').'_'.$this->value;
    }
}
