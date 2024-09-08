<?php

namespace App\Exceptions\Auth;

use App\Data\Auth\InviteData;
use Exception;
use JetBrains\PhpStorm\Pure;

class InviteLimitException extends Exception
{
    public function __construct(InviteData $inviteData)
    {
        parent::__construct("Invite with id '{$inviteData->id}' ({$inviteData->hash}) has expired limit");
    }
}