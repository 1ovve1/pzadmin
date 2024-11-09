<?php

use App\Jobs\Servers\Zomboid\Logs\LogsUpdaterJob;
use App\Jobs\Servers\Zomboid\UpdateStatusJob as ZomboidUpdateStatusJob;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schedule;

Schedule::job(App::make(ZomboidUpdateStatusJob::class))->everyFiveSeconds();
Schedule::job(App::make(LogsUpdaterJob::class))->everyFiveSeconds();
