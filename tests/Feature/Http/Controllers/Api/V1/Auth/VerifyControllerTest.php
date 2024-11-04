<?php

/** @var TestCase $this */

use App\Models\Auth\Invite;
use App\Models\Auth\User;
use Tests\TestCase;

/** @link \App\Http\Controllers\Api\V1\Auth\VerifyController::hash() */
test('test hash verify', function () {
    $invite = Invite::factory()->create(['limit' => 1]);

    $this->getJson(route('v1.auth.verify.hash', ['hash' => $invite->hash]))
        ->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
});

/** @link \App\Http\Controllers\Api\V1\Auth\VerifyController::hash() */
test('test wrong hash verify', function () {
    $invite = Invite::factory()->make(['limit' => 1]);

    $this->getJson(route('v1.auth.verify.hash', ['hash' => $invite->hash]))
        ->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND);
});

/** @link \App\Http\Controllers\Api\V1\Auth\VerifyController::username() */
test('test username verify', function () {
    $user = User::factory()->make();

    $this->getJson(route('v1.auth.verify.username', ['username' => $user->username]))
        ->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
});

/** @link \App\Http\Controllers\Api\V1\Auth\VerifyController::username() */
test('test wrong username verify', function () {
    $user = User::factory()->create();

    $this->getJson(route('v1.auth.verify.username', ['username' => $user->username]))
        ->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND);
});

/** @link \App\Http\Controllers\Api\V1\Auth\VerifyController::email() */
test('test email verify', function () {
    $user = User::factory()->make();

    $this->getJson(route('v1.auth.verify.email', ['email' => $user->email]))
        ->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
});

/** @link \App\Http\Controllers\Api\V1\Auth\VerifyController::email() */
test('test wrong email verify', function () {
    $user = User::factory()->create();

    $this->getJson(route('v1.auth.verify.email', ['email' => $user->email]))
        ->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND);
});
