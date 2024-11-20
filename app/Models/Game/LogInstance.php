<?php

namespace App\Models\Game;

use App\Data\Game\LogInstanceData;
use App\Exceptions\Repositories\Game\LogInstance\LogInstanceNotFoundException;
use App\Repositories\Game\LogInstance\LogInstanceEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LogInstance extends Model
{
    /** @use HasFactory<Factory<LogInstance>> */
    use HasFactory;

    protected $fillable = [
        'name',
        'checksum',
    ];

    protected $casts = [
        'name' => LogInstanceEnum::class,
    ];

    /**
     * @return HasMany<Log>
     */
    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    /**
     * @throws LogInstanceNotFoundException
     */
    public static function fromLogInstanceData(LogInstanceData $logInstanceData): LogInstance
    {
        return LogInstance::where('name', $logInstanceData->name)->first() ?? throw new LogInstanceNotFoundException($logInstanceData);
    }

    /**
     * @throws LogInstanceNotFoundException
     */
    public static function fromLogInstanceEnum(LogInstanceEnum $logInstanceEnum): LogInstance
    {
        return LogInstance::where('name', $logInstanceEnum)
            ->first() ?? throw new LogInstanceNotFoundException($logInstanceEnum);
    }
}
