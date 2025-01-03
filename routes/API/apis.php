<?php

use App\Http\Controllers\API\{AboutController, ChannelsController, ChildrenController, FilmsController, HomeController, NewsController, PodcastsController, ProgramsController, SeriesesController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//About Endpoint
Route::get('about', AboutController::class);

//Home Endpoint
Route::get('home', HomeController::class);

//Channels
Route::get('channels', [ChannelsController::class, 'index']);
Route::get('channels/{channel:slug}', [ChannelsController::class, 'show'])->name('channels.show');

//Children
Route::get('children', [ChildrenController::class, 'index']);
Route::get('children/{child:slug}', [ChildrenController::class, 'show'])->name('children.show');
Route::get('children/{child:slug}/episodes/{episode}', [ChildrenController::class, 'showEpisode'])->name('episodes.show');

//Films
Route::get('films', [FilmsController::class, 'index']);
Route::get('films/{film:slug}', [FilmsController::class, 'show'])->name('films.show');

//Podcasts
Route::get('podcasts', [PodcastsController::class, 'index']);
Route::get('podcasts/{podcast:slug}', [PodcastsController::class, 'show'])->name('podcasts.show');
Route::get('podcasts/{podcast:slug}/episodes/{episode}', [PodcastsController::class, 'showEpisode'])->name('episodes.show');

//Programs
Route::get('programs', [ProgramsController::class, 'index']);
Route::get('programs/{program:slug}', [ProgramsController::class, 'show'])->name('programs.show');
Route::get('programs/{program:slug}/episodes/{episode}', [ProgramsController::class, 'showEpisode'])->name('episodes.show');

//Serieses
Route::get('serieses', [SeriesesController::class, 'index']);
Route::get('serieses/{series:slug}', [SeriesesController::class, 'show'])->name('serieses.show');
Route::get('serieses/{series:slug}/episodes/{episode}', [SeriesesController::class, 'showEpisode'])->name('episodes.show');

//News
Route::get('news', [NewsController::class, 'index']);
Route::get('news/important', [NewsController::class, 'important']);
Route::get('news/{news}', [NewsController::class, 'show'])->name('news.show');
