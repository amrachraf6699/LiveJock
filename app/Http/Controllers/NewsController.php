<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $importantNews = News::where('is_important', 1)->latest()->take(5)->get();
        $news = News::latest()->paginate(10);

        return view('news.index', compact('importantNews', 'news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }
}
