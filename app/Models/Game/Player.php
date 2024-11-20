<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Player extends Model
{
    /** @use HasFactory<Factory<Player>> */
    use HasFactory;

    protected $fillable = [
        'server_id', 'name',
    ];

    /**
     * @return HasOne<Server>
     */
    public function server(): HasOne
    {
        return $this->hasOne(Server::class);
    }
}
