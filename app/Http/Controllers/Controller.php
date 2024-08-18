<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    protected function json(Data|DataCollection|Paginator $data, int $statusCode = Response::HTTP_OK): Response
    {
        $json = match ($data instanceof Data) {
            true => \response()->json([
                'data' => $data->jsonSerialize(),
            ]),
            false => \response()
                ->json($data->jsonSerialize()),
        };

        return $json->setStatusCode($statusCode);
    }
}
