<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Zomboid\ZomboidServiceInterface;
use Inertia\Inertia;
use Inertia\Response;

class WelcomeController extends Controller
{
    public function __construct(
    ) {
    }

    public function index(): Response
    {
        return Inertia::render('Welcome');
    }
}
