<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Child;
use App\Models\Film;
use App\Models\Podcast;
use App\Models\Program;
use App\Models\Series;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($section)
    {
        $models = [
            'channels' => Channel::class,
            'kids-channels' => Child::class,
            'movies' => Film::class,
            'podcasts' => Podcast::class,
            'programs' => Program::class,
            'series' => Series::class,
        ];

        if (!array_key_exists($section, $models)) {
            return response()->json([
                'title' => 'غير موجود',
                'content' => 'لا يوجد محتوى لهذا القسم.'
            ], 404);
        }

        $model = $models[$section];
        $content = $model::latest()->limit(5)->get();

        return response()->json([
            'data' => $content
        ]);
    }
}
