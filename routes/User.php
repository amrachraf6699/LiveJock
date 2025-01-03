<?php

use App\Http\Controllers\User\BrowseCategoryController;
use App\Http\Controllers\User\ContentController;
use App\Http\Controllers\User\FilmsController;
use App\Http\Controllers\User\HomeController;
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

Route::get('', HomeController::class)->name('browse');

Route::get('films', [FilmsController::class , 'index'])->name('films');
Route::get('films/{film:slug}', [FilmsController::class , 'show'])->name('films.show');

Route::get('content/{section}', ContentController::class)->name('content');