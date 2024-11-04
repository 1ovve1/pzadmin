<?php

declare(strict_types=1);

namespace Database\Factories\Game;

use App\Enums\Docker\ContainerStatusEnum;
use App\Enums\ServerEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ServerEnum::ZOMBOID->value,
            'prefix' => config('app.name'),
            'status' => ContainerStatusEnum::ACTIVE->value,
        ];
    }
}
