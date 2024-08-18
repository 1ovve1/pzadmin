<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthServiceInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function __construct(
        readonly private AuthServiceInterface $authService,
    ) {
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $this->authService->authenticated();

            return redirect(route("admin.dashboard"));
        } catch (AuthenticationException $e) {

            return Inertia::render('Login');
        }

    }
}
