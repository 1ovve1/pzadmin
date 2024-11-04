<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

final readonly class WelcomeController extends Controller
{
    public function __invoke(): Renderable
    {
        return view('app');
    }
}
