<?php

namespace App\Http\Controllers;

use App\Models\{Program , Film , Channel , Child};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $programs = Program::inRandomOrder()->limit(5)->get();
        $films = Film::inRandomOrder()->limit(5)->get();
        $channels = Channel::inRandomOrder()->limit(5)->get();
        $children = Child::inRandomOrder()->limit(5)->get();
        return view('welcome', compact('channels', 'films' , 'programs' , 'children'));
    }
}
