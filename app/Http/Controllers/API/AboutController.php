<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $about = About::first()->only(['email' , 'phone', 'facebook', 'twitter', 'website', 'youtube' , 'logo' , 'channel_frequency', 'instagram', 'snapchat']);

        return SendResponse(200, 'About retrieved successfully.', $about);
    }
}
