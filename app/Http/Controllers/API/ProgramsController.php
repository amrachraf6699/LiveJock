<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\EpisodesResource;
use App\Http\Resources\API\ProgramsResource;
use App\Models\Episode;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::all();

        return SendResponse(200, 'Programs retrieved successfully.', ProgramsResource::collection($programs));
    }

    public function show(Program $program)
    {
        $program->load('episodes');

        return SendResponse(200, 'Program retrieved successfully.', new ProgramsResource($program));
    }

    public function showEpisode(Program $program, Episode $episode)
    {
        $episode = $program->episodes()->where('id', $episode->id)->first();

        if(!$episode)
        {
            return SendResponse(404, 'Episode not found.');
        }

        return SendResponse(200, 'Episode retrieved successfully.', new EpisodesResource($episode));
    }
}
