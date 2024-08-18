<?php

declare(strict_types=1);

namespace App\Repositories\Auth\Token;

use App\Data\Auth\TokenData;
use App\Data\Auth\UserData;
use App\Models\Auth\User;
use App\Repositories\Abstract\AbstractRepository;
use DateTimeInterface;
use Illuminate\Support\Str;

class TokenRepository extends AbstractRepository implements TokenRepositoryInterface
{
    public function createFor(UserData $userData, array $abilities = [], ?DateTimeInterface $expiresAt = null): TokenData
    {
        $plainTextToken = $this->generateTokenString();

        $personalAccessToken = User::find($userData->id)?->tokens()->create([
            'name' => $userData->username,
            'token' => hash('sha256', $plainTextToken),
            'abilities' => $abilities,
            'expires_at' => $expiresAt,
        ]);

        return new TokenData($personalAccessToken->token);
    }

    /**
     * Generate the token string.
     */
    private function generateTokenString(): string
    {
        return sprintf(
            '%s%s%s',
            config('sanctum.token_prefix', ''),
            $tokenEntropy = Str::random(40),
            hash('crc32b', $tokenEntropy)
        );
    }
}
