<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Exceptions\Auth\InviteNotFoundException;
use App\Exceptions\Auth\UserNotFoundException;
use App\Http\Controllers\Controller;
use App\Services\Auth\Invite\InviteServiceInterface;
use App\Services\Auth\User\UserServiceInterface;
use Symfony\Component\HttpFoundation\Response;

final readonly class VerifyController extends Controller
{
    public function __construct(
        private InviteServiceInterface $authService,
        private UserServiceInterface $userService,
    ) {}

    public function hash(string $hash): Response
    {
        try {
            $this->authService->verifyInviteHash($hash);

            return $this->noContent();
        } catch (InviteNotFoundException) {
            return $this->notFound();
        }

    }

    public function username(string $username): Response
    {
        try {
            $this->userService->findUserByUsername($username);

            return $this->notFound();
        } catch (UserNotFoundException) {
            return $this->noContent();
        }
    }

    public function email(string $email): Response
    {
        try {
            $this->userService->findUserByEmail($email);

            return $this->notFound();
        } catch (UserNotFoundException) {
            return $this->noContent();
        }
    }
}
