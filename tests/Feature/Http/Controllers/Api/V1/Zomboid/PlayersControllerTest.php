<?php

use Database\Seeders\DatabaseSeeder;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('players with pagination test', function () {
    $response = $this->get(route('v1.zomboid.players.index'));

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
