<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ChangePasswordRequest;
use App\Http\Requests\API\UpdateProfileRequest;
use App\Http\Resources\API\ProfileResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\SessionsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return SendResponse(200, 'Here\'s your information', new ProfileResource($user));
    }

    public function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->validated());

        $user = auth()->user();

        return SendResponse(200, 'Your profile updated successfully', new ProfileResource($user));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        if(!Hash::check($request->current_password, auth()->user()->password))
        {
            return SendResponse(400, 'Your old password is incorrect');
        }

        auth()->user()->update(['password' => $request->password]);

        return SendResponse(200, 'Your password updated successfully');
    }

    public function deleteAccount()
    {
        auth()->user()->delete();

        return SendResponse(200, 'Your account deleted successfully');
    }

    public function sessions()
    {
        $sessions = auth()->user()->tokens;

        return SendResponse(200, 'Here are your active sessions' , SessionsResource::collection($sessions));
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return SendResponse(200, 'You logged out successfully');
    }

    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();

        return SendResponse(200, 'You logged out from all devices successfully');
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications;


        return SendResponse(200, 'Here\'s your notifications', NotificationResource::collection($notifications));
    }

    public function notification($notification)
    {
        $notification = auth()->user()->notifications()->where('id', $notification)->first();

        if(!$notification)
        {
            return SendResponse(404, 'Notification not found');
        }

        $notification->markasRead();


        return SendResponse(200, 'Here\'s your notification', new NotificationResource($notification));
    }
}
