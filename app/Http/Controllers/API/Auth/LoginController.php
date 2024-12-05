<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');


        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('authToken')->plainTextToken;

            return SendResponse(200, 'Welcome Back, ' . auth()->user()->name, ['token' => $token]);
        }

        return SendResponse(401, 'Invalid Credentials');

    }
}
