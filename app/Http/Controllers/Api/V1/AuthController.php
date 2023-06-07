<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(SignupRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return $this->successResponse(201, 'Registration successful', [
            'user' => UserResource::make($user),
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ]);
    }


    public function login(LoginRequest $request): JsonResponse
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return $this->errorResponse(401, 'Incorrect password!');
        }

        $user = User::where('email', $request->email)->first();

        return $this->successResponse(200, 'Login successful', [
            'user' => UserResource::make($user),
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ]);
    }
}
