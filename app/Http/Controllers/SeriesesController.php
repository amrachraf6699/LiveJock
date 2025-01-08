<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesesController extends Controller
{
    public function index(Request $request)
    {
        $serieses = Series::paginate(10);

        return view('serieses.index', compact('serieses'));
    }

    public function show(Series $series)
    {
        $series->load('episodes');

        return view('serieses.show', compact('series'));
    }

    public function episode(Series $series, Episode $episode)
    {
        $episode = $series->episodes()->where('id', $episode->id)->first();

        if (!$episode) {
            return to_route('home');
        }

        $episodes = $series->episodes()->orderBy('created_at', 'asc')->get();

        return view('serieses.episode', compact('series', 'episode', 'episodes'));
    }
}
