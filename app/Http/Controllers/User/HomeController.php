<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
