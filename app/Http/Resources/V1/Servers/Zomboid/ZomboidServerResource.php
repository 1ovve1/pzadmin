<?php

namespace App\Http\Resources\V1\Servers\Zomboid;

use App\Http\Resources\Abstract\AbstractResource;
use App\Http\Resources\V1\Players\PlayersResource;
use App\Models\Game\Server;
use Illuminate\Http\Request;

/**
 * @mixin Server
 */
class ZomboidServerResource extends AbstractResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ip' => config('zomboid.ip'),
            'port' => config('zomboid.port'),
            'status' => $this->status,
            'players' => [
                'list' => PlayersResource::collection($this->players),
            ],
        ];
    }
}
