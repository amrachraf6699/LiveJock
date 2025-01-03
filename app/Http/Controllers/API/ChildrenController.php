<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\ChildrenResource;
use App\Http\Resources\API\EpisodesResource;
use App\Models\Child;
use App\Models\Episode;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    public function index()
    {
        $children = Child::paginate(10);

        return SendResponse(200,
        'Serieses retrieved successfully.',
        [
            'pagination' => [
                'total' => $children->total(),
                'from' => $children->firstItem(),
                'to' => $children->lastItem(),
                'next_page' => $children->nextPageUrl(),
                'prev_page' => $children->previousPageUrl(),
                'first_page' => $children->url(1),
                'last_page' => $children->url($children->lastPage())
            ],
            'data' => ChildrenResource::collection($children)
        ]);
    }

    public function show(Child $child)
    {
        $child->setRelation('episodes', $child->episodes()->paginate(10));

        return SendResponse(200, 'series retrieved successfully.', new ChildrenResource($child));
    }

    public function showEpisode(Child $child, Episode $episode)
    {
        $episode = $child->episodes()->where('id', $episode->id)->first();

        if(!$episode)
        {
            return SendResponse(404, 'Episode not found.');
        }

        return SendResponse(200, 'Episode retrieved successfully.', new EpisodesResource($episode));
    }
}
