<?php

namespace Database\Seeders\Game;

use App\Models\Game\Log;
use App\Models\Game\LogInstance;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (LogInstance::all() as $LogInstance) {
            Log::factory()->count(10)->sequence(fn ($sequence) => ['log_instance_id' => $LogInstance->id]);
        }
    }
}
