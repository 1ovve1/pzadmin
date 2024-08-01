<?php

namespace App\Models;

use App\Enums\ServerEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Server extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];

    /**
     * @param ServerEnum $enum
     * @return Builder<Server>
     */
    public static function server(ServerEnum $enum): Builder
    {
        return Server::query()->where('name', $enum->name());
    }
}
