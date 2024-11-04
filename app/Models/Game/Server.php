<?php

namespace App\Models\Game;

use App\Enums\Docker\ContainerStatusEnum;
use App\Enums\ServerEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefix',
        'name',
        'status',
    ];

    protected $casts = [
        'name' => ServerEnum::class,
        'status' => ContainerStatusEnum::class,
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
    ];

    /**
     * @return Builder<Server>
     */
    public static function server(ServerEnum $enum): Builder
    {
        return Server::where('prefix', config('app.name'))->where('name', $enum->value);
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }
}
