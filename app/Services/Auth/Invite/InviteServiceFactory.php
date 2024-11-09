<?php

declare(strict_types=1);

namespace App\Services\Auth\Invite;

use App\Services\Abstract\ServiceFactoryInterface;
use Illuminate\Support\Facades\App;

class InviteServiceFactory implements ServiceFactoryInterface
{
    public function get(): InviteServiceInterface
    {
        return App::make(InviteService::class);
    }
}
