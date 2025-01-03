<?php

use App\Http\Controllers\API\User\ProfileController;
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

//Profile
Route::get('',[ProfileController::class,'index']);
Route::post('update-profile' , [ProfileController::class,'update']);
Route::post('change-password' , [ProfileController::class,'changePassword']);
Route::delete('delete-account' , [ProfileController::class,'deleteAccount']);

//Logout
Route::get('sessions' , [ProfileController::class,'sessions']);
Route::post('logout' , [ProfileController::class,'logout']);
Route::post('logout-all' , [ProfileController::class,'logoutAll']);

//Notifications
Route::get('notifications', [ProfileController::class , 'notifications']);
Route::get('notifications/{notification}', [ProfileController::class , 'notification'])->name('notification');

