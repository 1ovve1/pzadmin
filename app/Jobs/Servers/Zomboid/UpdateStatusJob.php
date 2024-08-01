<?php

namespace App\Jobs\Servers\Zomboid;

use App\Enums\ServerEnum;
use App\Events\Servers\Zomboid\StatusEvent as ZomboidStatusEvent;
use App\Models\Server;
use App\Services\Zomboid\ZomboidServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class UpdateStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $zomboidService = $this->getZomboidService();

        $serverStatus = $zomboidService->getsStatus();
        $serverStatusDatabaseLog = Server::server(ServerEnum::ZOMBOID)->first();

        if ($serverStatusDatabaseLog->status !== $serverStatus) {

            ZomboidStatusEvent::dispatch($serverStatus);

            $serverStatusDatabaseLog->update(['status' => $serverStatus]);
        }
    }

    private function getZomboidService(): ZomboidServiceInterface
    {
        return App::make(ZomboidServiceInterface::class);
    }
}
