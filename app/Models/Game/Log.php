<?php

namespace App\Models\Game;

use App\Data\Game\LogData;
use App\Exceptions\Repositories\Game\Log\LogDataNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_instance_id',
        'type',
        'scope',
        'message',
    ];

    public function logInstance(): BelongsTo
    {
        return $this->belongsTo(LogInstance::class);
    }

    /**
     * @throws LogDataNotFoundException
     */
    public static function fromLogData(LogData $logData)
    {
        return Log::where('type', $logData->type)
            ->where('id', $logData->id)
            ->orWhere('message', $logData->message)
            ->where('scope', $logData->scope)
            ->where('type', $logData->type)
            ->first() ?? throw new LogDataNotFoundException($logData);
    }
}
