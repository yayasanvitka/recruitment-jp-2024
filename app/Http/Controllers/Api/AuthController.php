<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return ResponseHelper::throwUnauthorizedError("Invalid credentials");
        }

        /** @var User $user */
        $user = Auth::user();
        $accessToken = $user->createToken('access_token')->plainTextToken;
    
        $user['access_token'] = $accessToken;

        return ResponseHelper::returnOkResponse("User logged in", $user);
    }
}
