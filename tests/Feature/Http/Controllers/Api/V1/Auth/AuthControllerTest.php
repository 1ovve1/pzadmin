<?php

use App\Models\Auth\Invite;
use App\Models\Auth\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/** @var TestCase $this */

/** @link \App\Http\Controllers\Api\V1\Auth\AuthController::login() */
test('login test', function () {
    $password = '12345678';
    $user = User::factory()->create(['password' => $password]);

    $this->assertEmpty($user->tokens()->get());

    $response = $this->postJson(route('v1.auth.login'), [
        'username' => $user->username, 'password' => $password,
    ]);

    $this->assertNotEmpty($user->tokens()->get());

    $response->assertStatus(Response::HTTP_ACCEPTED)
        ->assertJson([
            'data' => [
                'type' => 'Bearer',
            ],
        ]);
});

/** @link \App\Http\Controllers\Api\V1\Auth\AuthController::index() */
test('authenticated test', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->getJson(route('v1.auth.index'));

    $response->assertStatus(Response::HTTP_OK)
        ->assertJson([
            'data' => [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
            ],
        ])->assertJsonMissingPath('data.password');
});

/** @link \App\Http\Controllers\Api\V1\Auth\AuthController::ping() */
test('ping test', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->getJson(route('v1.auth.tokens.ping'));

    $response->assertStatus(Response::HTTP_NO_CONTENT);
});

/** @link \App\Http\Controllers\Api\V1\Auth\AuthController::ping() */
test('ping fail test', function () {
    $response = $this->getJson(route('v1.auth.tokens.ping'));

    $response->assertStatus(Response::HTTP_UNAUTHORIZED);
});

/** @link \App\Http\Controllers\Api\V1\Auth\AuthController::regenerate() */
test('regenerate test', function () {
    $user = User::factory()->create();
    $newToken = $user->createToken('test');

    $response = $this->getJson(route('v1.auth.tokens.regenerate'), ['Authorization' => "Bearer {$newToken->plainTextToken}"]);

    $response->assertStatus(Response::HTTP_ACCEPTED)
        ->assertJson([
            'data' => [
                'type' => 'Bearer',
            ]
        ]);
    $this->assertModelMissing($newToken->accessToken);
});

/** @link \App\Http\Controllers\Api\V1\Auth\AuthController::logout() */
test('logout test', function () {
    $user = User::factory()->create();
    $newToken = $user->createToken('test');

    $response = $this->getJson(route('v1.auth.logout'), ['Authorization' => "Bearer {$newToken->plainTextToken}"]);

    $response->assertStatus(Response::HTTP_NO_CONTENT);
    $this->assertModelMissing($newToken->accessToken);
    $this->assertEmpty($user->tokens);
});

/** @link \App\Http\Controllers\Api\V1\Auth\AuthController::registration() */
test('registration test', function () {
    $password = '12345678';
    $user = User::factory()->make();
    $invite = Invite::factory()->create(['limit' => 1]);

    $this->assertModelMissing($user);
    $response = $this->postJson(route('v1.auth.registration'), [
        ...$user->toArray(),
        'password' => $password,
        'password_confirmation' => $password,
        'hash' => $invite->hash
    ]);

    $this->assertTrue(User::whereUsername($user->username)->exists());
    $response->assertStatus(Response::HTTP_ACCEPTED)
        ->assertJson([
            'data' => [
                'type' => 'Bearer',
            ]
        ]);
});

/** @link \App\Http\Controllers\Api\V1\Auth\AuthController::registration() */
test('registration fail validation (username) test', function () {
    $existedUser = User::factory()->create();
    $password = '12345678';
    $user = User::factory()->make([...$existedUser->toArray(), 'email' => 'another@mail.ru']);
    $invite = Invite::factory()->create(['limit' => 1]);

    $response = $this->postJson(route('v1.auth.registration'), [
        ...$user->toArray(),
        'password' => $password,
        'password_confirmation' => $password,
        'hash' => $invite->hash
    ]);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson([
            'message' => 'The username has already been taken.',
            'errors' => [
                'username' => [
                    'The username has already been taken.'
                ]
            ]
        ]);
});


/** @link \App\Http\Controllers\Api\V1\Auth\AuthController::registration() */
test('registration fail validation (email) test', function () {
    $existedUser = User::factory()->create();
    $password = '12345678';
    $user = User::factory()->make([...$existedUser->toArray(), 'username' => 'another_username']);
    $invite = Invite::factory()->create(['limit' => 1]);

    $response = $this->postJson(route('v1.auth.registration'), [
        ...$user->toArray(),
        'password' => $password,
        'password_confirmation' => $password,
        'hash' => $invite->hash
    ]);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson([
            'message' => 'The email has already been taken.',
            'errors' => [
                'email' => [
                    'The email has already been taken.'
                ]
            ]
        ]);
});
