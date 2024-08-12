<?php

namespace App\Models;

use App\Enums\ServerEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @method static \Database\Factories\ServerFactory factory($count = null, $state = [])
 * @method static Builder|Server newModelQuery()
 * @method static Builder|Server newQuery()
 * @method static Builder|Server query()
 * @method static Builder|Server whereCreatedAt($value)
 * @method static Builder|Server whereId($value)
 * @method static Builder|Server whereName($value)
 * @method static Builder|Server whereStatus($value)
 * @method static Builder|Server whereUpdatedAt($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Player> $players
 * @property-read int|null $players_count
 *
 * @mixin \Eloquent
 */
class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    /**
     * @return Builder<Server>
     */
    public static function server(ServerEnum $enum): Builder
    {
        return Server::query()->where('name', $enum->name());
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }
}
