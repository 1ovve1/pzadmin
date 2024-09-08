<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Services\Auth\User\UserServiceInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

readonly final class UsersController extends Controller
{
    public function __construct(
        private UserServiceInterface $userService
    ) {}

    /**
     * @throws AuthenticationException
     */
    function auth(): Response
    {
        $user = $this->userService->authenticated();

        return $this->json($user, Response::HTTP_ACCEPTED);
    }
}
