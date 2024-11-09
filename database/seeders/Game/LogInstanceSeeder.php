<?php

namespace Database\Seeders\Game;

use App\Models\Game\LogInstance;
use App\Repositories\Game\LogInstance\LogInstanceEnum;
use Illuminate\Database\Seeder;

class LogInstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (LogInstanceEnum::cases() as $logInstanceEnum) {
            if (LogInstance::where('name', $logInstanceEnum)->doesntExist()) {
                LogInstance::create([
                    'name' => $logInstanceEnum,
                    'checksum' => $logInstanceEnum->checksum(),
                ]);
            }
        }
    }
}
