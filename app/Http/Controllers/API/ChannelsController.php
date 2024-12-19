<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\ChannelsResource;
use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function index()
    {
        $channels = Channel::paginate(10);

        return SendResponse(200,
        'Channels retrieved successfully.',
        [
            'pagination' => [
                'total' => $channels->total(),
                'from' => $channels->firstItem(),
                'to' => $channels->lastItem(),
                'next_page' => $channels->nextPageUrl(),
                'prev_page' => $channels->previousPageUrl(),
                'first_page' => $channels->url(1),
                'last_page' => $channels->url($channels->lastPage())
            ],
            'data' => ChannelsResource::collection($channels),
        ]);
    }

    public function show(Channel $channel)
    {
        return SendResponse(200, 'Channel retrieved successfully.', new ChannelsResource($channel));
    }
}
