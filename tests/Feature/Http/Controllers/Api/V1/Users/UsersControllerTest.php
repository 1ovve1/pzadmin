<?php

use App\Models\Auth\User;
use Tests\TestCase;

/** @var TestCase $this */
test('test me', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->getJson(route('v1.users.auth'));

    $response->assertJson([
        'data' => [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
        ],
    ])->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_ACCEPTED);
});
