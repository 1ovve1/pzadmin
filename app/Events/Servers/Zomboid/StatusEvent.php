<?php

namespace App\Events\Servers\Zomboid;

use App\Enums\Docker\ContainerStatusEnum;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        private readonly ContainerStatusEnum $enum
    ) {}

    public function broadcastAs(): string
    {
        return 'status';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('servers.zomboid'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'status' => $this->enum->value,
        ];
    }
}
