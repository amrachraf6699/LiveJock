<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\{Film,Ad};
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
    
        $sort = $request->input('sort', 'newest');
    
        $query = Film::query();
    
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
    
        if ($sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }
    
        $films = $query->paginate(12); 

        return view('browse.films', compact('films'));
    }

    public function show(Film $film)
    {
        $film->load('file');

        $other_films = Film::where('id', '!=', $film->id)->inRandomOrder()->limit(4)->get();

        $ad = Ad::inRandomOrder()->first();


        return view('browse.film', compact('film' , 'other_films' , 'ad'));
    }
    
}
