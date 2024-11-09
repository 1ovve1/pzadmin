<?php

declare(strict_types=1);

namespace Database\Factories\Game;

use App\Enums\Models\Game\ServerEnum;
use App\Models\Game\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    public function definition(): array
    {
        $server = Server::server(ServerEnum::ZOMBOID)->firstOr(
            callback: fn () => Server::factory()->create()
        );

        return [
            'server_id' => $server->id,
            'name' => fake()->userName(),
        ];
    }
}
