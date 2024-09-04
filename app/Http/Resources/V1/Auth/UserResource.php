<?php

namespace App\Http\Resources\V1\Auth;

use App\Http\Resources\Abstract\AbstractResource;
use App\Models\Auth\User;
use Illuminate\Http\Request;

/**
 * @mixin User
 */
class UserResource extends AbstractResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //            'username' => $this->username
        ];
    }
}
