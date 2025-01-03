<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\FilmsResource;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    public function index()
    {
        $films = Film::paginate(10);

        return SendResponse(200,
        'Films retrieved successfully.',
        [
            'pagination' => [
                'total' => $films->total(),
                'from' => $films->firstItem(),
                'to' => $films->lastItem(),
                'next_page' => $films->nextPageUrl(),
                'prev_page' => $films->previousPageUrl(),
                'first_page' => $films->url(1),
                'last_page' => $films->url($films->lastPage())
            ],
            'data' => FilmsResource::collection($films),
        ]);
    }

    public function show(Film $film)
    {
        return SendResponse(200, 'Film retrieved successfully.', new FilmsResource($film));
    }
}
