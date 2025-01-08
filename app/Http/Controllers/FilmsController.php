<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Film,Ad};
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    public function index(Request $request)
    {
        $films = Film::paginate(10);

        return view('films.index', compact('films'));
    }

    public function show(Film $film)
    {
        $film->load('file');

        return view('films.show', compact('film'));
    }

}
