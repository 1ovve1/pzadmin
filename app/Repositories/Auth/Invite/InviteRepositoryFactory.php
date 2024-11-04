<?php

declare(strict_types=1);

namespace App\Repositories\Auth\Invite;

use App\Repositories\Abstract\RepositoryFactoryInterface;
use Illuminate\Support\Facades\App;

class InviteRepositoryFactory implements RepositoryFactoryInterface
{
    public function get(): InviteRepositoryInterface
    {
        return App::make(InviteRepository::class);
    }
}
