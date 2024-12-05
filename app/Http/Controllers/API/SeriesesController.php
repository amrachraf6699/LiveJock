<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\EpisodesResource;
use App\Http\Resources\API\SeriesesResource;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesesController extends Controller
{
    public function index()
    {
        $serieses = Series::all();

        return SendResponse(200, 'Serieses retrieved successfully.',  SeriesesResource::collection($serieses));
    }

    public function show(Series $series)
    {
        $series->load('episodes');

        return SendResponse(200, 'series retrieved successfully.', new SeriesesResource($series));
    }

    public function showEpisode(Series $series, Episode $episode)
    {
        $episode = $series->episodes()->where('id', $episode->id)->first();

        if(!$episode)
        {
            return SendResponse(404, 'Episode not found.');
        }

        return SendResponse(200, 'Episode retrieved successfully.', new EpisodesResource($episode));
    }
}
