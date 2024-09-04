<?php

declare(strict_types=1);

namespace App\Repositories\Auth\User;

use App\Data\Auth\LoginData;
use App\Data\Auth\RegistrationData;
use App\Data\Auth\UserData;
use App\Exceptions\Auth\IncorrectPasswordException;
use App\Exceptions\Auth\UserNotFoundException;
use App\Repositories\Abstract\RepositoryInterface;
use Illuminate\Auth\AuthenticationException;

interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * @throws AuthenticationException
     */
    public function authenticated(): UserData;

    /**
     * @throws UserNotFoundException
     */
    public function findByUsername(string $username): UserData;

    /**
     * @throws UserNotFoundException
     */
    public function findByEmail(string $email): UserData;

    public function create(RegistrationData $registrationData): UserData;
}
