<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::all();

        return SendResponse(200, 'News retrieved successfully.', NewsResource::collection($news));
    }

    public function important()
    {
        $news = News::where('is_important', true)->get();

        return SendResponse(200, 'Important news retrieved successfully.', NewsResource::collection($news));
    }

    public function show(News $news)
    {
        return SendResponse(200, 'News retrieved successfully.', new NewsResource($news));
    }
}
