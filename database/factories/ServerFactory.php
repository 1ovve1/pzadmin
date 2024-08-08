<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ServerEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ServerEnum::ZOMBOID->name(),
        ];
    }

}
