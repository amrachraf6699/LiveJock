<?php

use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PodcastsController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SeriesesController;
use App\Models\Ad;
use App\Models\Channel;
use App\Models\Child;
use App\Models\Film;
use App\Models\Podcast;
use App\Models\Program;
use App\Models\Series;
use App\Notifications\NewFilmNotification;
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

Route::get('' , HomeController::class)->name('home');


Route::get('films/{film:slug}', [FilmsController::class , 'show'])->name('films.show');
Route::get('podcasts/{podcast:slug}', [PodcastsController::class , 'show'])->name('podcasts.show');
Route::get('programs/{program:slug}', [ProgramsController::class , 'show'])->name('programs.show');
Route::get('channels/{channel:slug}', [ChannelsController::class , 'show'])->name('channels.show');
Route::get('children/{child:slug}', [ChildrenController::class , 'show'])->name('children.show');
Route::get('serieses/{series:slug}', [SeriesesController::class , 'show'])->name('serieses.show');


Route::get('children/{child:slug}/{episode}', [ChildrenController::class , 'episode'])->name('children.episode');
Route::get('podcasts/{podcast:slug}/{episode}', [PodcastsController::class , 'episode'])->name('podcasts.episode');
Route::get('programs/{program:slug}/{episode}', [ProgramsController::class , 'episode'])->name('programs.episode');
Route::get('serieses/{series:slug}/{episode}', [SeriesesController::class , 'episode'])->name(name: 'serieses.episode');



Route::get('films', [FilmsController::class , 'index'])->name('films');
Route::get('children', [ChildrenController::class , 'index'])->name('children');
Route::get('channels', [ChannelsController::class , 'index'])->name('channels');
Route::get('podcasts', [PodcastsController::class , 'index'])->name('podcasts');
Route::get('programs', [ProgramsController::class , 'index'])->name('programs');
Route::get('serieses', [SeriesesController::class , 'index'])->name('serieses');

Route::get('search' , [SearchController::class, 'index'])->name('search');
Route::get('search/json' , [SearchController::class, 'json'])->name('search.json');


Route::get('news',[NewsController::class, 'index'])->name('news');

Route::get('news/{news}',[NewsController::class, 'show'])->name('newsWeb.show');
Route::view('success', 'success')->name('success');




Auth::routes();
