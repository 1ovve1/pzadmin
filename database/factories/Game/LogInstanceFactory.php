<?php

namespace Database\Factories\Game;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game\LogInstance>
 */
class LogInstanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'path' => fake()->filePath(),
            'checksum' => fake()->md5(),
        ];
    }
}
