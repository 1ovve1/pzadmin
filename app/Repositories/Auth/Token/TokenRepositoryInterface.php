<?php

declare(strict_types=1);

namespace App\Repositories\Auth\Token;

use App\Data\Auth\TokenData;
use App\Data\Auth\UserData;
use App\Exceptions\Auth\TokenNotFoundException;
use App\Repositories\Abstract\RepositoryInterface;
use DateTimeInterface;

interface TokenRepositoryInterface extends RepositoryInterface
{
    /**
     * @param  array<string>  $abilities
     */
    public function createFor(UserData $userData, array $abilities = ['*'], ?DateTimeInterface $expiresAt = null): TokenData;

    /**
     * @throws TokenNotFoundException
     */
    public function update(UserData $userData, int $tokenId): TokenData;

    public function delete(int $tokenId): void;
}
