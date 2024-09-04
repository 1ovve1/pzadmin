<?php

use Database\Seeders\DatabaseSeeder;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/** @var TestCase $this */

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

/**
 * @link \App\Http\Controllers\Api\V1\Zomboid\PlayersController::index()
 */
test('players with pagination test', function () {
    $response = $this->getJson(route('v1.zomboid.players.index'));

    $response->assertStatus(Response::HTTP_OK)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'name',
                ],
            ],
            'links',
        ])->assertJsonCount(10, 'data');
});
