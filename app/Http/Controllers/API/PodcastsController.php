<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\EpisodesResource;
use App\Http\Resources\API\PodcastResource;
use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastsController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::paginate(10);

        return SendResponse(
            200,
             'Podcasts retrieved successfully.',
             [
                'pagination' =>
                [
                    'total' => $podcasts->total(),
                    'from' => $podcasts->firstItem(),
                    'to' => $podcasts->lastItem(),
                    'next_page' => $podcasts->nextPageUrl(),
                    'prev_page' => $podcasts->previousPageUrl(),
                    'first_page' => $podcasts->url(1),
                    'last_page' => $podcasts->url($podcasts->lastPage())
                ],
                'data' => PodcastResource::collection($podcasts)
             ]
            );
    }

    public function show(Podcast $podcast)
    {
        $podcast->setRelation('episodes', $podcast->episodes()->paginate(10));

        return SendResponse(200, 'Program retrieved successfully.', new PodcastResource($podcast));
    }

    public function showEpisode(Podcast $podcast, Episode $episode)
    {
        $episode = $podcast->episodes()->where('id', $episode->id)->first();

        if(!$episode)
        {
            return SendResponse(404, 'Episode not found.');
        }

        return SendResponse(200, 'Episode retrieved successfully.', new EpisodesResource($episode));
    }
}
