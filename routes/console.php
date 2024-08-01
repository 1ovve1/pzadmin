<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\Servers\Zomboid\UpdateStatusJob as ZomboidUpdateStatusJob;

Schedule::job(App::make(ZomboidUpdateStatusJob::class))->everyFiveSeconds();
