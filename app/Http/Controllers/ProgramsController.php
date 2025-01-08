<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function index(Request $request)
    {
        $programs = Program::paginate(10);

        return view('programs.index', compact('programs'));
    }

    public function show(Program $program)
    {
        $program->load('episodes');

        return view('programs.show', compact('program'));
    }

    public function episode(Program $program, Episode $episode)
    {
        $episode = $program->episodes()->where('id', $episode->id)->first();

        if (!$episode) {
            return to_route('home');
        }

        $episodes = $program->episodes()->orderBy('created_at', 'asc')->get();

        return view('programs.episode', compact('program', 'episode', 'episodes'));
    }
}
