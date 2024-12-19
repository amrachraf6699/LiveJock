<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(ForgotPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Password::createToken($user);
            $user->sendPasswordResetNotification($token);
        }
        
        return SendResponse(200, 'If you are registered, you will receive an email with instructions on how to reset your password. Otherwise, please check your email.');
    }

}
