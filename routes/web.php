<?php

use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::view('success', 'success')->name('success');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::Get('testv', function(){
    $film = Film::inRandomOrder()->first();
    foreach (App\Models\User::all() as $user) {
        echo $user->notify(new NewFilmNotification($film));
    }
});
