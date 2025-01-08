<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastsController extends Controller
{
    public function index(Request $request)
    {
        $podcasts = Podcast::paginate(10);

        return view('podcasts.index', compact('podcasts'));
    }

    public function show(Podcast $podcast)
    {
        $podcast->load('episodes');

        return view('podcasts.show', compact('podcast'));
    }

    public function episode(Podcast $podcast, Episode $episode)
    {
        $episode = $podcast->episodes()->where('id', $episode->id)->first();

        if (!$episode) {
            return to_route('home');
        }

        $episodes = $podcast->episodes()->orderBy('created_at', 'asc')->get();

        return view('podcasts.episode', compact('podcast', 'episode', 'episodes'));
    }
}
