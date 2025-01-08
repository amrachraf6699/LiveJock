<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Episode;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    public function index(Request $request)
    {
        $children = Child::paginate(10);

        return view('children.index', compact('children'));
    }

    public function show(Child $child)
    {
        $child->load('episodes');

        return view('children.show', compact('child'));
    }

    public function episode(Child $child, Episode $episode)
    {
        $episode = $child->episodes()->where('id', $episode->id)->first();

        if (!$episode) {
            return to_route('home');
        }

        $episodes = $child->episodes()->orderBy('created_at', 'asc')->get();

        return view('children.episode', compact('child', 'episode', 'episodes'));
    }

}
