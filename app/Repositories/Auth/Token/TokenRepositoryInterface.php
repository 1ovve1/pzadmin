<?php

declare(strict_types=1);

namespace App\Repositories\Auth\Token;

use App\Data\Auth\TokenData;
use App\Data\Auth\UserData;
use App\Repositories\Abstract\RepositoryInterface;
use DateTimeInterface;

interface TokenRepositoryInterface extends RepositoryInterface
{
    function createFor(UserData $userData, array $abilities = [], ?DateTimeInterface $expiresAt = null): TokenData;
}
