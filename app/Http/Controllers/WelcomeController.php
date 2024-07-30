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
        $credentials = config('zomboid.servers')[config('zomboid.driver')];

        return Inertia::render('Welcome', [
            'server' => [
                ...$credentials,
                'survivors' => [
                    'count' => 0
                ]
            ]
        ]);
    }
}
