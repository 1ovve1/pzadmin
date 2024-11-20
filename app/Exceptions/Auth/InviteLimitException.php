<?php

namespace App\Exceptions\Auth;

use App\Data\Auth\InviteData;
use App\Exceptions\CheckedException;

class InviteLimitException extends CheckedException
{
    protected string $messageFormat = "Invite with id '%s' (%s) has expired limit";

    public function __construct(InviteData $inviteData)
    {
        parent::__construct($this->formatMessage($inviteData->id, $inviteData->hash));
    }
}
