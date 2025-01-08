<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function index(Request $request)
    {
        $channels = Channel::paginate(10);

        return view('channels.index', compact('channels'));
    }


    public function show(Channel $channel)
    {

        return view('channels.show', compact('channel'));
    }
}
