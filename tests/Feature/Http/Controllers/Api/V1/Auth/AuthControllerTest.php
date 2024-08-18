<?php

use App\Models\Auth\User;
use Symfony\Component\HttpFoundation\Response;

test('login test', function () {
    $password = '12345678';
    $user = User::factory()->create(['password' => $password]);

    $response = $this->post(route('v1.auth.login'), [
        'username' => $user->username, 'password' => $password,
    ]);

    $response->assertStatus(Response::HTTP_ACCEPTED)
        ->assertJsonStructure([
            'data' => [
                'token', 'type',
            ],
        ]);
});

test('authenticated test', function () {
    $password = '12345678';
    $user = User::factory()->create(['password' => $password]);

    $response = $this->actingAs($user)->get(route('v1.auth.index'));

    $response->assertStatus(Response::HTTP_OK)
        ->assertJsonStructure([
            'data' => [
                'id', 'username', 'updated_at', 'created_at',
            ],
        ]);
});
