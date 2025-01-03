<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\AdsResource;
use App\Http\Resources\API\ChannelsResource;
use App\Http\Resources\API\ChildrenResource;
use App\Http\Resources\API\FilmsResource;
use App\Http\Resources\API\PodcastResource;
use App\Http\Resources\API\ProgramsResource;
use App\Http\Resources\API\SeriesesResource;
use App\Models\Ad;
use App\Models\Channel;
use App\Models\Child;
use App\Models\Film;
use App\Models\Podcast;
use App\Models\Program;
use App\Models\Series;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return SendResponse(200,
        'Welcome to Home',
        [
            'channels' => ChannelsResource::collection(Channel::take(6)->get()),
            'programs' => ProgramsResource::collection(Program::take(4)->get()),
            'films' => FilmsResource::collection(Film::take(4)->get()),
            'serieses' => SeriesesResource::collection(Series::take(4)->get()),
            'podcasts' => PodcastResource::collection(Podcast::take(4)->get()),
            'children' => ChildrenResource::collection(Child::take(4)->get()),
            'ads' => AdsResource::collection(Ad::all()),
        ]);
    }
}
