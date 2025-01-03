<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Jobs\RegisterJob;
use App\Models\User;
use App\Notifications\RegisterNotification;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        RegisterJob::dispatch($user);

        $token = $user->createToken('from_register')->plainTextToken;

        return SendResponse(201, 'Welcome to ' . env('APP_NAME') . '!', ['token' => $token]);
    }
}
