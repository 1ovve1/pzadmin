<?php

namespace Database\Seeders\Game;

use App\Enums\Models\Game\ServerEnum;
use App\Models\Game\Server;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Server::server(ServerEnum::ZOMBOID)->firstOr(callback: fn () => Server::factory()->create());
    }
}
