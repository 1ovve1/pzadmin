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
        foreach (ServerEnum::cases() as $serverEnum) {
            if (Server::server($serverEnum)->doesntExist()) {
                (new Server(['name' => $serverEnum->name(), 'status' => 'none']))->save();
            }
        }
    }
}
