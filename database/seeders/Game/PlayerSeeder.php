<?php

namespace Database\Seeders\Game;

use App\Models\Game\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::factory()->count(10)->create();
    }
}
