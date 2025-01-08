<?php

namespace App\Http\Controllers;

use App\Models\{Channel , Child , Film , Podcast , Program , Series};
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return view('search');
    }

    public function json(Request $request)
    {
        $query = $request->input('q');

        
        $films = Film::where('name', 'like', "%$query%")->get();
        $podcasts = Podcast::where('name', 'like', "%$query%")->get();
        $programs = Program::where('name', 'like', "%$query%")->get();
        $channels = Channel::where('name', 'like', "%$query%")->get();
        $children = Child::where('name', 'like', "%$query%")->get();
        $serieses = Series::where('name', 'like', "%$query%")->get();

        // dd($films);
        return response()->json([
            'films' => $films,
            'podcasts' => $podcasts,
            'programs' => $programs,
            'channels' => $channels,
            'children' => $children,
            'serieses' => $serieses,
        ]);
    }
}
