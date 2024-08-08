<?php

namespace Database\Seeders;

use App\Enums\ServerEnum;
use App\Models\Server;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Server::server(ServerEnum::ZOMBOID)->firstOr(callback: fn() => Server::factory()->create());
    }
}
