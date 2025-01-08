<?php

namespace App\Http\Controllers;

use App\Models\{Program , Film , Channel , Child , Podcast , Series};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $programs = Program::with('episodes')->inRandomOrder()->limit(15)->get();
        $films = Film::with('file')->inRandomOrder()->limit(15)->get();
        $channels = Channel::inRandomOrder()->limit(15)->get();
        $children = Child::with('episodes')->inRandomOrder()->limit(15)->get();
        $podcasts = Podcast::with('episodes')->inRandomOrder()->limit(15)->get();
        $serieses = Series::with('episodes')->inRandomOrder()->limit(15)->get();


        $programs->each->setAttribute('route_name', 'programs.show');
        $films->each->setAttribute('route_name', 'films.show');
        $channels->each->setAttribute('route_name', 'channels.show');
        $children->each->setAttribute('route_name', 'children.show');
        $podcasts->each->setAttribute('route_name', 'podcasts.show');
        $serieses->each->setAttribute('route_name', 'serieses.show');

        $slider_items = collect()
            ->merge($programs)
            ->merge($films)
            ->merge($channels)
            ->merge($children)
            ->merge($podcasts)
            ->merge($serieses)
            ->shuffle();

        return view('welcome', compact('channels', 'films', 'programs', 'children','podcasts' ,'serieses' , 'slider_items'));
    }

}
