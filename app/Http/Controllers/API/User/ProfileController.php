<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ChangePasswordRequest;
use App\Http\Requests\API\UpdateProfileRequest;
use App\Http\Resources\API\ProfileResource;
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
}
