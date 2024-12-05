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
        $channels = Channel::all();

        return SendResponse(200, 'Channels retrieved successfully.', ChannelsResource::collection($channels));
    }

    public function show(Channel $channel)
    {
        return SendResponse(200, 'Channel retrieved successfully.', new ChannelsResource($channel));
    }
}
