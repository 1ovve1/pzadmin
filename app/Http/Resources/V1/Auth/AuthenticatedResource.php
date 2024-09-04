<?php

namespace App\Http\Resources\V1\Auth;

use App\Http\Resources\Abstract\AbstractResource;
use App\Models\Auth\PersonalAccessToken;
use Illuminate\Http\Request;

/**
 * @mixin PersonalAccessToken
 */
class AuthenticatedResource extends AbstractResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'token' => $this->token,
            'type' => 'Bearer',
        ];
    }
}
