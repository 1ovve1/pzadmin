<?php

namespace Database\Factories\Game;

use App\Models\Game\LogInstance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'log_instance_id' => LogInstance::factory()->create()->id,
            'type' => fake()->word(),
            'scope' => fake()->word(),
            'message' => fake()->text(),
        ];
    }
}
